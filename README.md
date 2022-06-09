<h2>Project Demo</h2>
  <ul>
    <li>Home Page</li>
    <li>Admin Dashboard</li>
  </ul>
<img src = "https://github.com/saputhebeast/jubilant-octo-goggles/blob/main/demo/home.jpg">
<img src = "https://github.com/saputhebeast/jubilant-octo-goggles/blob/main/demo/admin.jpg">

<h2>Requirements</h2>
<ul>
  <li>You must have: </li>
  <ul>
      <li>PHP</li>
      <li>MySQL</li>
      <li>Server like Apache</li>
      <li>You can easily manage everything using XAMPP</li>
  </ul>
</ul>

<h2>Running the Project</h2>
<ol>
    <li>
        <h4>Setup Files</h4>
        <ul>
          <li>Copy this files to <code>C:\xampp\htdocs\php</code> directory.</li>
          <li>Start MySQL and Apache from XAMPP Control Panel.</li>
          <li>Create Database
            <ul>
                <li>Go to PHP MyAdmin <code>http://localhost/phpmyadmin/index.php</code></li>
                <li>Create database. Give name as ecommerce</li>
                <li>Import ecommerce.sql file</li>
            </ul>
          </li>
          <li>User Side: <code>jubilant-octo-goggles/src/user/user.php</code></li>
          <li>Admin Side: <code>jubilant-octo-goggles/src/admin/admin.php</code></li>
        </ul>
    </li>
    <li>
        <h4>Login Credentials</h4>
        <ul>
            <li>User Login: 
                <ul>
                    <li>Email: <code>andrew@gmail.com</code></li>
                    <li>Password: <code>andrew</code></li>
                </ul>
            </li>
            <li>Admin Login: 
                <ul>
                    <li>Email: <code>jason@gmail.com</code></li>
                    <li>Password: <code>jason123</code></li>
                </ul>
            </li>
        </ul>
    </li>
    <li>
        <h4>Setup Sending Email Service Using XAMPP Server</h4>
        <ul>
            <li>Requirements: 
                <ul>
                    <li>Gmail Account (turn off two-factor authentication and turn on 'access for less secure apps settings')</li>
                    <li>SMTP Server Address- smtp.gmail.com</li>
                    <li>Port- 465</li>
                    <li>Username- your gmail address</li>
                    <li>Password- your gmail password</li>
                </ul>
            </li>
            <li>Setup:
                <ul>
                    <li>Backup before modifying the files below</li>
                    <ul>
                        <li><code>xampp/sendmail/sendmail</code></li>
                        <li><code>xampp/php/php</code></li>
                    </ul>
                </ul>
                <ul>
                    <li>Change Below Things in Sendmail File Which Located in <code>C:\xampp\sendmail</code></li>
                    <ul>
                        <li>smtp_server=smtp.gmail.com</li>
                        <li>smtp_port=465</li>
                        <li>error_logfile=error.log --> uncomment if this one commented</li>
                        <li>debug_logfile=debug.log --> uncomment if this one commented</li>
                        <li>auth_username= your gmail address</li>
                        <li>auth_password= your gmail password</li>
                        <li>force_sender= your gmail address</li>
                    </ul>
                </ul>
                <ul>
                    <li>Change Below Things in PHP File Which Located in <code>C:\xampp\php</code></li>
                    <ul>
                        <li>SMTP=smtp.gmail.com</li>
                        <li>smtp_port=465</li>
                        <li>sendmail_from= your gmail address</li>
                        <li>set path without changing anything. if your xampp not in C, change C.
                            <ul>
                                <li>sendmail_path= "\"C:\xampp\sendmail\sendmail.exe\" -t"</li>
                            </ul>
                        </li>
                        <li>restart apache on xampp before sending mails in contact form</li>
                </ul>
            </li>
        </ul>
    </li>
</ol>






