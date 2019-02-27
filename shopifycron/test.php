 <?php echo "vivin";
set_include_path(get_include_path() . PATH_SEPARATOR . 'lib/phpseclib1.0.9');
include('Net/SFTP.php');
echo 1; 
     $sftp = new Net_SFTP('13.210.157.197');
     if (!$sftp->login('playertekftp', 'p6e5VY0uMWgVE')){
         echo 'Login Failed';
     } else {
echo "success";
}
 echo 2;
     echo $sftp->pwd() . "\r\n";
     $sftp->put('/mlnk/TEST/SO/filename.txt', 'hello, world!');
     print_r($sftp->nlist());

