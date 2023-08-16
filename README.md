# digithaiExam

1.  Download then extract the digithaiExam.
    
2.  Update your Homestead.yaml file.
    

1.  Reference for setting up homestead.yaml - Note: type: “nfs” is for mac os only
    
   ```
 folders:
        - map: ~/code/thinkbit/digithaiExam
        to: /home/vagrant/thinkbit/digithaiExam
        type: "nfs"

    sites:
        - map: laravel.thinkbitsolutions.local #localhost url site
        to: /home/vagrant/thinkbit/digithaiExam/public
        schedule: true
        type: "apache"

    databases:
        - thinkbit_digithaiExam
        
2.  If you haven’t installed the plugin `(https://github.com/cogitatio/vagrant-hostsupdater)`. Install using `vagrant plugin install vagrant-hostsupdater` on homestead directory. This is for the vagrant automatically managing the `hosts` file and for the localhost url site on your homestead yaml to work.
    
3.  If your machine is running on windows, open command-prompt and run as administrator then type this command cacls %SYSTEMROOT%\system32\drivers\etc\hosts /E /G %USERNAME%:W
    

3.  Connect via SSH
    
4.  Navigate to your project’s directory
    
5.  Execute composer install
    
6.  Execute php -r "file_exists('.env') || copy('.env.example', '.env');"
    
7.  Update .env variables such as DB_DATABASE, DB_USERNAME & DB_PASSWORD
    
8.  Update mail driver setup(do not use test email for local development)

9.  Execute php artisan key:generate
    
10.  Execute php artisan migrate (Note : if you have seeder execute php artisan db:seed)
    
11.  In your browser, navigate to your project’s URL to check if you’ve set up correctly.
    
12.  Run composer install
