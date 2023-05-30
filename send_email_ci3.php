<?php 
public function demosendSMTPEmail($recipeinets, $from, $subject, $message) {
		$this->load->library('parser');

        $config['protocol'] = 'smtp';
        $config['wordwrap'] = FALSE;
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $config['crlf'] = "\r\n";
        $config['smtp_host'] = SMTP_SERVER_NAME;
        $config['smtp_user'] = SMTP_USERNAME;
        $config['smtp_pass'] = SMTP_PASSWORD;
        $config['smtp_port'] = SMTP_PORT;
        $config['newline'] = "\r\n";
        $config['smtp_crypto'] = 'ssl';
        //$config['smtp_crypto'] = 'tls';
        $this->load->library('email', $config);
        $this->email->initialize($config);
    	
    	$this->email->set_newline("\r\n");  
        
    	// $this->email->from($from['email'], $from['name']);
    	$this->email->from('no-reply@anseccrmsoft.com','ANSEC Collections');
        $this->email->subject($subject);

        /*$this->email->clearAllRecipients();*/
        $this->email->to($recipeinets);
        $this->email->cc('ansec.dealer@gmail.com');
        $this->email->message($message);
    	
    	if($this->email->send()){ 
    	echo 'sent';
    	}else{
    	show_error($this->email->print_debugger());
    	}
    	die;
    	
    	return $this->email->send();
    }
