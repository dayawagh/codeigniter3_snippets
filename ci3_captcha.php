<?php 
        $this->load->helper('captcha');
        $length = 8;
        $captcha = substr(str_shuffle("QWERTYUIOPLKJHGFDSAZXCVBNM"), 0, $length);
        $_SESSION['captcha_code'] = $captcha;
        
        $path = 'registration_captcha';
        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }
        
        $vals = array(
            'word'          => $captcha,
            'img_path'      => 'registration_captcha/',
            'img_url'       => base_url() . 'registration_captcha/',
            'font_path'     => 'fonts/ARLRDBD.ttf',
            'img_width'     => '120',
            'img_height'    => 40,
            'expiration'    => 900,/* 15 Min */
            'word_length'   => 8,
            'font_size'     => 16,
            'img_id'        => 'ci_captcha_id',
            'pool'          => '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ',

            // White background and border, black text and red grid
            'colors' => array(
                'background' => array(255, 255, 255),
                'border' => array(255, 200, 150),
                'text' => array(0, 0, 0),
                'grid' => array(0, 255, 0)
            )
        );

        $cap = create_captcha($vals);
        $data['captcha'] = $cap['image'];
