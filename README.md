# CI-AdminLTE
CodeIgniter 3.x with AdminLTE 2.3.x

# Social Media

1. [Blog Mata Panda Crew](https://matapanda-crew.blogspot.com)
2. [FansPage Facebook](https://www.facebook.com/MATAPANDACREW)
3. [LinkedIn](https://www.linkedin.com/in/mata-panda-crew-a901b4179)
4. [Kaskus](https://www.kaskus.co.id/@emje07)
5. [Channel Youtube](https://www.youtube.com/channel/UCIcqJCL_mYexU781d_gBksg)
6. [WhatsApp](https://wa.me/send?phone=6288223748677?text=Hai%2C%20Mata%20Panda%20Crew)

## Installation

1. Silahkan Unzip package.
2. Upload `CI-AdminLTE` folders dan files ke server anda. normalnya file index.php anda ditambahkan ke folder root anda.
3. Silahkan buka `application/config/common/dp_config.php` file dengan text editor dan set base URL anda seperti ini:
```
// tulis didalam file dari project anda disini dimana anda develop locally.
$host_dev = 'CI-AdminLTE'; 

// silahkan tulis domain name disini dimana project anda akan online.
// Example : www.johndoe.com
//           johndoe.com
$host_prod = 'your_domain.tld';
```
4. Buat sebuah table dengan nama `ci_adminlte` dan inject data dari `db/sql/ci_adminlte.sql` file.
5. Silahkan anda rubah koneksi ke database anda di `application/config/database.php` file.

## Demo

Coming soon

### Login
 * Email : `admin@admin.com` / Password : `password`

## Browser Compatibility
Support for most major browsers including Chrome, Firefox, IE9+, Opera and Safari.

## Languages
  * English
  * French
  * Portuguese (translation by [marcelod](https://github.com/marcelod))
  * ... and more soon

## Server Requirements

PHP version 5.6 or newer is recommended.

It should work on 5.4.8 as well, but we strongly advise you NOT to run such old versions of PHP, because of potential security and performance issues, as well as missing features.

## Dependencies
| NAME | VERSION | WEB | REPO |
| :--- | :---: | :---: | :---: |
| CodeIgniter | 3.1.7 | [Website](https://codeigniter.com) | [Github](https://github.com/bcit-ci/CodeIgniter/)
| AdminLTE | 2.3.11 | [Website](https://adminlte.io) | [Github](https://github.com/almasaeed2010/AdminLTE/)
| Bootstrap | 3.3.7 | [Website](https://getbootstrap.com/docs/3.3) | [Github](https://github.com/twbs/bootstrap)
| Ion Auth | 2.6.0 | [Website](http://benedmunds.com/ion_auth) | [Github](https://github.com/benedmunds/CodeIgniter-Ion-Auth)
| jQuery | 2.2.4 | [Website](http://jquery.com) | [Github](https://github.com/jquery/jquery)
| Font Awesome | 4.7.0 | [Website](https://fontawesome.com/v4.7.0) | [Github](https://github.com/FortAwesome/Font-Awesome)
| Mobile Detect | 2.8.30 | [Website](http://mobiledetect.net) | [Github](https://github.com/serbanghita/Mobile-Detect)

## CodeIgniter 3 Documentation

* [User guide](https://codeigniter.com/user_guide)

## Reference

* [CodeIgniter](https://github.com/bcit-ci/CodeIgniter)
* [Translations for CodeIgniter System](https://github.com/bcit-ci/codeigniter3-translations)
* [AdminLTE](https://github.com/almasaeed2010/AdminLTE) 
