# Laravel Contacts
 By using this small app you can manage your contacts or you can utilize this app.
 
 ### Fetures
 - User Login or Registration
 - Facebook login or Registration
 - Contact Managment
 
### Steps to utilize
- Download this app in your server
- Run below command to install laravel dependenices

 ```sh
 Sudo Composer Install
 ```
 ### How to configure facebook app?
 - Go to /config/services.php and add your app details here with your callback urls
  ```sh
'facebook' => [
        'client_id'     => '',
        'client_secret' => '',
        'redirect'      => 'http://localhost/testZone/ladmin/blog/public/auth/callback',
    ],
```