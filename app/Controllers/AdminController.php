<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BlogModel;
use App\Models\CatalogueModel;
use App\Models\ReviewModel;
use App\Models\FaqModel;
use App\Models\UserModel; // Jika UserModel digunakan untuk mengambil info admin, dll.
use CodeIgniter\Exceptions\PageNotFoundException;

class AdminController extends BaseController
{
    // --- DEKLARASI PROPERTI MODEL ---
    protected $blogModel;
    protected $catalogueModel;
    protected $reviewModel;
    protected $faqModel;
    protected $userModel; // Untuk data user admin jika diperlukan

    // --- DEKLARASI HELPER ---
    // Helper akan otomatis di-load untuk semua method di controller ini
    // protected array $helpers = ['form', 'url', 'text'];

    // --- CONSTRUCTOR ---
    public function __construct()
    {
        // Inisialisasi semua model yang akan digunakan
        $this->blogModel = new BlogModel();
        $this->catalogueModel = new CatalogueModel();
        $this->reviewModel = new ReviewModel();
        $this->faqModel = new FaqModel();
        $this->userModel = new UserModel(); // Pastikan UserModel.php sudah ada
            // Load helper yang dibutuhkan di sini
        helper(['form', 'url', 'text']);
    }

    public function index()
    {
        $data = [
            'title' => 'Admin Dashboard',
            // Anda bisa menambahkan data lain di sini, misalnya jumlah postingan, produk, dll.
            // 'total_blogs' => $this->blogModel->countAllResults(),
            // 'total_catalogues' => $this->catalogueModel->countAllResults(),
        ];
        return view('admin/dashboard', $data);
    }

    // --- BLOG MANAGEMENT ---
    public function listBlog()
    {
        $data = [
            'title' => 'Kelola Blog',
            'blogs' => $this->blogModel->orderBy('updated_at', 'DESC')->findAll()
        ];
        return view('admin/blog/list', $data);
    }

    public function createBlog()
    {
        $data = [
            'title' => 'Tambah Postingan Blog',
            'validation' => \Config\Services::validation()
        ];
        return view('admin/blog/create', $data);
    }

    public function saveBlog()
    {
        $rules = [
            'judul_blog' => 'required|min_length[3]|max_length[255]',
            'deskripsi_blog' => 'required',
            'gambar_blog' => [
                'rules' => 'uploaded[gambar_blog]|max_size[gambar_blog,2048]|is_image[gambar_blog]|mime_in[gambar_blog,image/jpg,image/jpeg,image/png,image/webp]',
                'errors' => [
                    'uploaded' => 'Pilih gambar terlebih dahulu.',
                    'max_size' => 'Ukuran gambar terlalu besar (maks 2MB).',
                    'is_image' => 'Yang Anda pilih bukan gambar.',
                    'mime_in' => 'Format gambar harus jpg, jpeg, png, atau webp.'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('admin/blog/create')->withInput()->with('errors', $this->validator->getErrors());
        }

        $fileGambar = $this->request->getFile('gambar_blog');
        $namaGambar = 'default.jpg';
        if ($fileGambar->isValid() && !$fileGambar->hasMoved()) {
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move('img', $namaGambar); // Pindah ke public/img
        }

        $this->blogModel->save([
            'judul_blog' => $this->request->getVar('judul_blog'),
            'slug' => url_title($this->request->getVar('judul_blog'), '-', true),
            'deskripsi_blog' => $this->request->getVar('deskripsi_blog'),
            'gambar_blog' => $namaGambar,
        ]);

        session()->setFlashdata('pesan', 'Data blog berhasil ditambahkan.');
        return redirect()->to('admin/blog');
    }

    public function editBlog($slug = null)
    {
        if ($slug === null) { throw PageNotFoundException::forPageNotFound(); }
        $blog = $this->blogModel->where(['slug' => $slug])->first();
        if (empty($blog)) { throw new PageNotFoundException('Data blog dengan slug "' . esc($slug) . '" tidak ditemukan.');}
        $data = [
            'title' => 'Edit Postingan Blog',
            'validation' => \Config\Services::validation(),
            'blog' => $blog
        ];
        return view('admin/blog/edit', $data);
    }

    public function updateBlog($id_blog = null)
    {
        if ($id_blog === null) { throw PageNotFoundException::forPageNotFound(); }
        $blogLama = $this->blogModel->find($id_blog);
        if (!$blogLama) { throw PageNotFoundException::forPageNotFound('Postingan blog tidak ditemukan.');}

        $ruleJudul = 'required|min_length[3]|max_length[255]';
        if ($blogLama['judul_blog'] != $this->request->getVar('judul_blog')) {
            $ruleJudul = 'required|min_length[3]|max_length[255]|is_unique[blog.judul_blog,id_blog,' . $id_blog . ']';
        }

        $rules = [
            'judul_blog' => $ruleJudul,
            'deskripsi_blog' => 'required',
            'gambar_blog' => ['rules' => 'max_size[gambar_blog,2048]|is_image[gambar_blog]|mime_in[gambar_blog,image/jpg,image/jpeg,image/png,image/webp]']
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('admin/blog/edit/' . $blogLama['slug'])->withInput()->with('errors', $this->validator->getErrors());
        }

        $fileGambar = $this->request->getFile('gambar_blog');
        $namaGambar = $blogLama['gambar_blog'];

        if ($fileGambar->isValid() && !$fileGambar->hasMoved()) {
            $namaGambarBaru = $fileGambar->getRandomName();
            $fileGambar->move('img', $namaGambarBaru);
            if ($blogLama['gambar_blog'] && $blogLama['gambar_blog'] != 'default.jpg' && file_exists(FCPATH . 'img/' . $blogLama['gambar_blog'])) {
                unlink(FCPATH . 'img/' . $blogLama['gambar_blog']);
            }
            $namaGambar = $namaGambarBaru;
        }
        
        $this->blogModel->save([
            'id_blog' => $id_blog,
            'judul_blog' => $this->request->getVar('judul_blog'),
            'slug' => url_title($this->request->getVar('judul_blog'), '-', true),
            'deskripsi_blog' => $this->request->getVar('deskripsi_blog'),
            'gambar_blog' => $namaGambar,
        ]);

        session()->setFlashdata('pesan', 'Data blog berhasil diubah.');
        return redirect()->to('admin/blog');
    }

    public function deleteBlog($id_blog = null)
    {
        if ($id_blog === null) { throw PageNotFoundException::forPageNotFound(); }
        $blog = $this->blogModel->find($id_blog);
        if ($blog) {
            if ($blog['gambar_blog'] && $blog['gambar_blog'] != 'default.jpg' && file_exists(FCPATH . 'img/' . $blog['gambar_blog'])) {
                unlink(FCPATH . 'img/' . $blog['gambar_blog']);
            }
            $this->blogModel->delete($id_blog);
            session()->setFlashdata('pesan', 'Data blog berhasil dihapus.');
        } else {
            session()->setFlashdata('error', 'Data blog tidak ditemukan.');
        }
        return redirect()->to('admin/blog');
    }

    // --- CATALOGUE MANAGEMENT ---
    public function listCatalogue()
    {
        $data = [
            'title' => 'Kelola Katalog',
            'catalogues' => $this->catalogueModel->orderBy('updated_at', 'DESC')->findAll()
        ];
        return view('admin/catalogue/list', $data);
    }

    public function createCatalogue()
    {
        $data = [
            'title' => 'Tambah Produk Katalog',
            'validation' => \Config\Services::validation()
        ];
        return view('admin/catalogue/create', $data);
    }

    public function saveCatalogue()
    {
         $rules = [
            'nama_produk' => 'required|min_length[3]|max_length[255]',
            'harga_produk' => 'required|numeric|greater_than[0]',
            'stok_tersedia' => 'required|integer|greater_than_equal_to[0]',
            'gambar_produk' => [
                'rules' => 'uploaded[gambar_produk]|max_size[gambar_produk,2048]|is_image[gambar_produk]|mime_in[gambar_produk,image/jpg,image/jpeg,image/png,image/webp]',
                'errors' => [ /* ... sama seperti blog ... */ ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('admin/catalogue/create')->withInput()->with('errors', $this->validator->getErrors());
        }

        $fileGambar = $this->request->getFile('gambar_produk');
        $namaGambar = 'default.jpg';
        if ($fileGambar->isValid() && !$fileGambar->hasMoved()) {
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move('img', $namaGambar);
        }

        $this->catalogueModel->save([
            'nama_produk' => $this->request->getVar('nama_produk'),
            'slug' => url_title($this->request->getVar('nama_produk'), '-', true),
            'harga_produk' => $this->request->getVar('harga_produk'),
            'stok_tersedia' => $this->request->getVar('stok_tersedia'),
            'gambar_produk' => $namaGambar,
        ]);

        session()->setFlashdata('pesan', 'Produk katalog berhasil ditambahkan.');
        return redirect()->to('admin/catalogue');
    }
    
    public function editCatalogue($slug = null)
    {
        if ($slug === null) { throw PageNotFoundException::forPageNotFound(); }
        $catalogue = $this->catalogueModel->where(['slug' => $slug])->first();
        if (empty($catalogue)) { throw new PageNotFoundException('Produk dengan slug "' . esc($slug) . '" tidak ditemukan.');}
        $data = [
            'title' => 'Edit Produk Katalog',
            'validation' => \Config\Services::validation(),
            'catalogue' => $catalogue
        ];
        return view('admin/catalogue/edit', $data);
    }

    public function updateCatalogue($id_produk = null)
    {
        if ($id_produk === null) { throw PageNotFoundException::forPageNotFound(); }
        $catalogueLama = $this->catalogueModel->find($id_produk);
        if (!$catalogueLama) { throw PageNotFoundException::forPageNotFound('Produk tidak ditemukan.');}

        $ruleNama = 'required|min_length[3]|max_length[255]';
        if ($catalogueLama['nama_produk'] != $this->request->getVar('nama_produk')) {
            $ruleNama = 'required|min_length[3]|max_length[255]|is_unique[catalogue.nama_produk,id_produk,' . $id_produk . ']';
        }

        $rules = [
            'nama_produk' => $ruleNama,
            'harga_produk' => 'required|numeric|greater_than[0]',
            'stok_tersedia' => 'required|integer|greater_than_equal_to[0]',
            'gambar_produk' => ['rules' => 'max_size[gambar_produk,2048]|is_image[gambar_produk]|mime_in[gambar_produk,image/jpg,image/jpeg,image/png,image/webp]']
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('admin/catalogue/edit/' . $catalogueLama['slug'])->withInput()->with('errors', $this->validator->getErrors());
        }

        $fileGambar = $this->request->getFile('gambar_produk');
        $namaGambar = $catalogueLama['gambar_produk'];

        if ($fileGambar->isValid() && !$fileGambar->hasMoved()) {
            $namaGambarBaru = $fileGambar->getRandomName();
            $fileGambar->move('img', $namaGambarBaru);
            if ($catalogueLama['gambar_produk'] && $catalogueLama['gambar_produk'] != 'default.jpg' && file_exists(FCPATH . 'img/' . $catalogueLama['gambar_produk'])) {
                unlink(FCPATH . 'img/' . $catalogueLama['gambar_produk']);
            }
            $namaGambar = $namaGambarBaru;
        }
        
        $this->catalogueModel->save([
            'id_produk' => $id_produk,
            'nama_produk' => $this->request->getVar('nama_produk'),
            'slug' => url_title($this->request->getVar('nama_produk'), '-', true),
            'harga_produk' => $this->request->getVar('harga_produk'),
            'stok_tersedia' => $this->request->getVar('stok_tersedia'),
            'gambar_produk' => $namaGambar,
        ]);

        session()->setFlashdata('pesan', 'Produk katalog berhasil diubah.');
        return redirect()->to('admin/catalogue');
    }

    public function deleteCatalogue($id_produk = null)
    {
        if ($id_produk === null) { throw PageNotFoundException::forPageNotFound(); }
        $catalogue = $this->catalogueModel->find($id_produk);
         if ($catalogue) {
            if ($catalogue['gambar_produk'] && $catalogue['gambar_produk'] != 'default.jpg' && file_exists(FCPATH . 'img/' . $catalogue['gambar_produk'])) {
                unlink(FCPATH . 'img/' . $catalogue['gambar_produk']);
            }
            $this->catalogueModel->delete($id_produk);
            session()->setFlashdata('pesan', 'Produk katalog berhasil dihapus.');
        } else {
            session()->setFlashdata('error', 'Produk katalog tidak ditemukan.');
        }
        return redirect()->to('admin/catalogue');
    }

    // --- REVIEW MANAGEMENT ---
    public function listReview()
    {
        $data = [
            'title'   => 'Kelola Review Pelanggan',
            'reviews' => $this->reviewModel->orderBy('created_at', 'DESC')->findAll()
        ];
        return view('admin/review/list', $data);
    }

    public function createReview()
    {
        $data = [
            'title'      => 'Tambah Review Baru',
            'validation' => \Config\Services::validation()
        ];
        return view('admin/review/create', $data);
    }

    public function saveReview()
    {
        $rules = [
            'nama_pelanggan'    => 'required|min_length[3]|max_length[100]',
            'sebutan_pelanggan' => 'permit_empty|max_length[100]',
            'teks_review'       => 'required',
            'jumlah_rating'     => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[5]',
            'status'            => 'required|in_list[pending,approved,rejected]',
            'profile_pelanggan' => [
                'rules'  => 'max_size[profile_pelanggan,2048]|is_image[profile_pelanggan]|mime_in[profile_pelanggan,image/jpg,image/jpeg,image/png,image/webp]',
                'errors' => [ /* ... sama seperti sebelumnya ... */ ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('admin/review/create')->withInput()->with('errors', $this->validator->getErrors());
        }

        $fileGambar = $this->request->getFile('profile_pelanggan');
        $namaGambar = 'default_profile.jpg';

        if ($fileGambar && $fileGambar->isValid() && !$fileGambar->hasMoved()) {
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move('img', $namaGambar);
        }

        $this->reviewModel->save([
            'nama_pelanggan'    => $this->request->getVar('nama_pelanggan'),
            'sebutan_pelanggan' => $this->request->getVar('sebutan_pelanggan'),
            'teks_review'       => $this->request->getVar('teks_review'),
            'jumlah_rating'     => $this->request->getVar('jumlah_rating'),
            'profile_pelanggan' => $namaGambar,
            'status'            => $this->request->getVar('status'),
        ]);

        session()->setFlashdata('pesan', 'Review berhasil ditambahkan.');
        return redirect()->to('admin/review');
    }

    public function editReview($id_review = null)
    {
        if ($id_review === null) { throw PageNotFoundException::forPageNotFound(); }
        $review = $this->reviewModel->find($id_review);
        if (empty($review)) { throw PageNotFoundException::forPageNotFound('Review tidak ditemukan.');}
        $data = [
            'title'      => 'Edit Review Pelanggan',
            'validation' => \Config\Services::validation(),
            'review'     => $review
        ];
        return view('admin/review/edit', $data);
    }

    public function updateReview($id_review = null)
    {
        if ($id_review === null) { throw PageNotFoundException::forPageNotFound(); }
        $reviewLama = $this->reviewModel->find($id_review);
        if (!$reviewLama) { throw PageNotFoundException::forPageNotFound('Review tidak ditemukan.');}

        $rules = [
            'nama_pelanggan'    => 'required|min_length[3]|max_length[100]',
            'sebutan_pelanggan' => 'permit_empty|max_length[100]',
            'teks_review'       => 'required',
            'jumlah_rating'     => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[5]',
            'status'            => 'required|in_list[pending,approved,rejected]',
            'profile_pelanggan' => [
                'rules'  => 'max_size[profile_pelanggan,2048]|is_image[profile_pelanggan]|mime_in[profile_pelanggan,image/jpg,image/jpeg,image/png,image/webp]',
                'errors' => [ /* ... sama seperti sebelumnya ... */ ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('admin/review/edit/' . $id_review)->withInput()->with('errors', $this->validator->getErrors());
        }

        $fileGambar = $this->request->getFile('profile_pelanggan');
        $namaGambar = $reviewLama['profile_pelanggan'];

        if ($fileGambar && $fileGambar->isValid() && !$fileGambar->hasMoved()) {
            $namaGambarBaru = $fileGambar->getRandomName();
            $fileGambar->move('img', $namaGambarBaru);
            if ($namaGambar && $namaGambar != 'default_profile.jpg' && file_exists(FCPATH . 'img/' . $namaGambar)) {
                unlink(FCPATH . 'img/' . $namaGambar);
            }
            $namaGambar = $namaGambarBaru;
        }
        
        $this->reviewModel->save([
            'id_review'         => $id_review,
            'nama_pelanggan'    => $this->request->getVar('nama_pelanggan'),
            'sebutan_pelanggan' => $this->request->getVar('sebutan_pelanggan'),
            'teks_review'       => $this->request->getVar('teks_review'),
            'jumlah_rating'     => $this->request->getVar('jumlah_rating'),
            'profile_pelanggan' => $namaGambar,
            'status'            => $this->request->getVar('status'),
        ]);

        session()->setFlashdata('pesan', 'Review berhasil diupdate.');
        return redirect()->to('admin/review');
    }

    public function deleteReview($id_review = null)
    {
        if ($id_review === null) { throw PageNotFoundException::forPageNotFound(); }
        $review = $this->reviewModel->find($id_review);
        if ($review) {
            if ($review['profile_pelanggan'] && $review['profile_pelanggan'] != 'default_profile.jpg' && file_exists(FCPATH . 'img/' . $review['profile_pelanggan'])) {
                unlink(FCPATH . 'img/' . $review['profile_pelanggan']);
            }
            $this->reviewModel->delete($id_review);
            session()->setFlashdata('pesan', 'Review berhasil dihapus.');
        } else {
            session()->setFlashdata('error', 'Review tidak ditemukan.');
        }
        return redirect()->to('admin/review');
    }

    // --- FAQ MANAGEMENT ---
    public function listFaq()
    {
        $data = [
            'title' => 'Kelola FAQ',
            'faqs'  => $this->faqModel->orderBy('urutan', 'ASC')->orderBy('id_faq', 'ASC')->findAll()
        ];
        return view('admin/faq/list', $data);
    }

    public function createFaq()
    {
        $data = [
            'title'      => 'Tambah FAQ Baru',
            'validation' => \Config\Services::validation()
        ];
        return view('admin/faq/create', $data);
    }

    public function saveFaq()
    {
        $rules = [
            'pertanyaan' => 'required|min_length[5]',
            'jawaban'    => 'required|min_length[5]',
            'kategori'   => 'permit_empty|max_length[100]',
            'urutan'     => 'permit_empty|integer'
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('admin/faq/create')->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->faqModel->save([
            'pertanyaan' => $this->request->getVar('pertanyaan'),
            'jawaban'    => $this->request->getVar('jawaban'),
            'kategori'   => $this->request->getVar('kategori'),
            'urutan'     => $this->request->getVar('urutan') ?: 0,
        ]);

        session()->setFlashdata('pesan', 'FAQ berhasil ditambahkan.');
        return redirect()->to('admin/faq');
    }

    public function editFaq($id_faq = null)
    {
        if ($id_faq === null) { throw PageNotFoundException::forPageNotFound(); }
        $faq = $this->faqModel->find($id_faq);
        if (empty($faq)) { throw PageNotFoundException::forPageNotFound('FAQ tidak ditemukan.');}
        $data = [
            'title'      => 'Edit FAQ',
            'validation' => \Config\Services::validation(),
            'faq'        => $faq
        ];
        return view('admin/faq/edit', $data);
    }

    public function updateFaq($id_faq = null)
    {
        if ($id_faq === null) { throw PageNotFoundException::forPageNotFound(); }
        if (!$this->faqModel->find($id_faq)) { throw PageNotFoundException::forPageNotFound('FAQ tidak ditemukan.');}

        $rules = [
            'pertanyaan' => 'required|min_length[5]',
            'jawaban'    => 'required|min_length[5]',
            'kategori'   => 'permit_empty|max_length[100]',
            'urutan'     => 'permit_empty|integer'
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('admin/faq/edit/' . $id_faq)->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->faqModel->save([
            'id_faq'     => $id_faq,
            'pertanyaan' => $this->request->getVar('pertanyaan'),
            'jawaban'    => $this->request->getVar('jawaban'),
            'kategori'   => $this->request->getVar('kategori'),
            'urutan'     => $this->request->getVar('urutan') ?: 0,
        ]);

        session()->setFlashdata('pesan', 'FAQ berhasil diupdate.');
        return redirect()->to('admin/faq');
    }

    public function deleteFaq($id_faq = null)
    {
        if ($id_faq === null) { throw PageNotFoundException::forPageNotFound(); }
        if ($this->faqModel->find($id_faq)) {
            $this->faqModel->delete($id_faq);
            session()->setFlashdata('pesan', 'FAQ berhasil dihapus.');
        } else {
            session()->setFlashdata('error', 'FAQ tidak ditemukan.');
        }
        return redirect()->to('admin/faq');
    }
}