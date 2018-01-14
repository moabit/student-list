# Student List
Student registration system. Browse and search list of students. After registration user gets cookie-token. With this token user is able to edit his/her profile.
##Used technologies
1. Pimple DI Container 
2. Twig Template Engine 
3. Bootstrap 
4. Table Data Gateway pattern
5. Faker 
##Requirements
1. PHP 7+ and mbstring extension
2. MySQL Database
3. Composer
##Installation
1. Clone the project with `clone https://github.com/moabit/student-list.git`
2. Run `composer install` to install dependencies
3. Set `public` as root directory on your web server
4. Edit `config.json`
5. Import `students.sql`
6. To add more students uncomment `addStudents` in `index.php` file


