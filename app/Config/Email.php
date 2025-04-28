<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
    public string $fromEmail  = '';
    public string $fromName   = '';
    public string $protocol   = '';
    // ... (lainnya)
    
    public function __construct()
    {
        parent::__construct();
        
        $this->fromEmail  = env('email.fromEmail', 'no-reply@example.com');
        $this->fromName   = env('email.fromName', 'My Site');
        $this->protocol   = env('email.protocol', 'mail');
        $this->SMTPHost   = env('email.SMTPHost');
        $this->SMTPUser   = env('email.SMTPUser');
        $this->SMTPPass   = env('email.SMTPPass');
        $this->SMTPPort   = env('email.SMTPPort', 587);
        $this->SMTPCrypto = env('email.SMTPCrypto', 'tls');
        $this->mailType   = env('email.mailType', 'html');
    }
}