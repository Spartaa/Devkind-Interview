<h2>Devkind Senior Laravel Developer Test</h2>
<p>Users List , User can be edited and deleted and can change their password.
Activity Log for the changes is handled by User Model Observer on updating and deleting.
</p>
<h3>Step To Run Project </h3>
1. composer Install Command

2. npm install

3. Copy the example env file and make the required configuration changes in the .env file

cp .env.example .env

4. Generate a new application key

php artisan key:generate


5. Start the local development server

php artisan serve

6. Run the database migrations (Set the database connection in .env before migrating)
php artisan migrate
   
<h2>Database </h2>

7. php artisan migrate
