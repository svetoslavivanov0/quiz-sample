<p>This is an example quiz app, separated on two parts - frontend (Vue.JS) and backend (PHP), as each part must be run separately.

<p>First of all, download the code and make sure you have PHP installed and created database for this project</p>

<ol>
    <li>Open the `backend/app` folder and run `composer install`</li>
    <li>Create `.env` (must be the same as `.env-example`) and add the data</li>
    <li>Run the migration (`cd Database/migrations && php create_quotes_table.php`)</li>
    <li>Run the seeder (`cd Database/seeders && php add_quotes_seeder.php`)</li>
</ol>

<p>Then, all we have to do is go to the `quiz-sample`, create a `.env` file (same as `.env-example`) and add the route for the backend requests (VUE_APP_BACKEND=public address of the backend)</p>

<p>Once we've added the URL in the `.env`, we can run `npm install && npm run serve`, and the app will be running</p>