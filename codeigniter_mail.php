<?php
  $this->load->library('email');

            // Initialize email configuration
            $config['protocol'] = 'smtp';
            $config['smtp_host'] = 'smtp.gmail.com';
            $config['smtp_user'] = 'mplussoftmailtesting@gmail.com';
            $config['smtp_pass'] = 'cduropuknklmuzys';
            $config['smtp_port'] = 587; // or 465 for SSL
            $config['smtp_crypto'] = 'tls'; // or 'ssl' for SSL
            $config['charset'] = 'utf-8';
            $config['mailtype'] = 'html';
            $config['newline'] = "\r\n";
            
            $this->email->initialize($config);
            
            // Set email parameters
            $this->email->from('dayanand.w@mplussoft.in', 'Daya');
            $this->email->to('dayawagh54@gmail.com');
            $this->email->subject('Test Email via SMTP');
            $this->email->message('This is a test email sent via SMTP using CodeIgniter.');
            
            // Send email
            if ($this->email->send()) {
                echo 'Email sent successfully!';
            } else {
                echo 'Error: ' . $this->email->print_debugger();
            }
?>
