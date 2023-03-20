<?php
// Load the DB utility class
$this->load->dbutil();

$prefs = array(
        'tables'        => array('table1', 'table2'),   // Array of tables to backup.
        'ignore'        => array(),                     // List of tables to omit from the backup
        'format'        => 'txt',                       // gzip, zip, txt
        'filename'      => 'mybackup.sql',              // File name - NEEDED ONLY WITH ZIP FILES
        'add_drop'      => TRUE,                        // Whether to add DROP TABLE statements to backup file
        'add_insert'    => TRUE,                        // Whether to add INSERT data to backup file
        'newline'       => "\n"                         // Newline character used in backup file
);

$this->dbutil->backup($prefs);

// Load the file helper and write the file to your server
$this->load->helper('file');
write_file('/path/to/mybackup.gz', $backup);

// Load the download helper and send the file to your desktop
$this->load->helper('download');
force_download('mybackup.gz', $backup);

?>
