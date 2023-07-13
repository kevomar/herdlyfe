<p align ="center">
   <img src="public/img/animal.png"
      height = "100">

# <p align ="center"> HERDLYFE  

## <p align ="center"> A Web Based Application Aiming to Enhance Kenyan Farmers' Livestock Trade Through Detailed Cattle Information Sharing

Herdlyfe is a powerful web-based application designed for Kenyan dairy farmers. It simplifies record-keeping, enhances cattle trading, and fosters collaboration within the farming community. With Herdlyfe, you can efficiently manage your herds, track important data, and connect with buyers and sellers in a secure marketplace. Experience the future of dairy farming with Herdlyfe and unlock your business's full potential. Join our community today and thrive in the dynamic world of cattle management and trading.
## Features

- Comprehensive Record-Keeping: Easily create and manage herds, track milk production data, monitor vaccination and health records, view breeding history, and track pregnancy cycles.
- Marketplace Functionality: List cattle for sale, connect with potential buyers, and facilitate secure transactions within the Herdlyfe marketplace.
- Notifications and Reminders: Receive important event notifications, such as vaccination dates, to stay on top of essential tasks and ensure timely actions.

## Technologies used

- Laravel: Herdlyfe utilizes the Laravel PHP framework, known for its elegant syntax, robust features, and ease of development. Laravel provides a solid foundation for building secure, scalable, and efficient web applications.
- HTML5/CSS3: The front-end of Herdlyfe is developed using HTML5 and CSS3, ensuring a responsive and visually appealing user interface. These technologies enable flexible layout designs, multimedia support, and enhanced styling options.
- JavaScript: JavaScript is extensively used to add interactivity and dynamic functionality to the Herdlyfe application. It enables features such as real-time data updates, form validation, user interactions, and AJAX-based communication.
- MySQL: Herdlyfe utilizes MySQL, a widely used relational database management system, to store and manage data efficiently. MySQL ensures data integrity, scalability, and robustness, allowing for secure and reliable data storage.
- jQuery: The jQuery library is employed to simplify and streamline JavaScript programming, making it easier to handle DOM manipulation, event handling, and AJAX requests. It enhances the overall user experience and improves the performance of the application.
- Bootstrap: Herdlyfe leverages the Bootstrap framework to ensure responsive and mobile-friendly design. Bootstrap provides a collection of CSS and JavaScript components that facilitate the creation of visually consistent and adaptable web interfaces.

## Installation

To install and run the Herdlyfe website from GitHub, follow these steps:

1. Clone the Repository: Open the command line interface and navigate to the desired directory where you want to store the project. Then, run the following command to clone the repository:
   
   ```
   git clone https://github.com/kevomar/herdlyfe.git
   ```
   
2. Install Dependencies: Once the repository is cloned, navigate into the project directory using the command line and install the required dependencies by running the following commands:
   
   ```
   composer install
   npm install
   ```
   
3. Configure the Environment: Set up the necessary environment variables by creating a `.env` file based on the provided `.env.example` file. Configure the database connection details and any other required variables.
   
   ```
   Rename the .env.example file to .env
   ```
   
4. Run the database migrations:
   
    ```
    php artisan migrate
    ```

5. Generate Application Key: Generate the application key by running the following command:
   
   ```
   php artisan key:generate
   ```
    
6. Start the development server:
   
    ```
    php artisan serve
    ```
7. Access the Website: Once the server is up and running, open your web browser and navigate to
   
   ```
   http://localhost:8000
   ```
   
   or the specified URL. You should now be able to access and use the Herdlyfe website.
   
Make sure to set up a database and update the `.env` file with your database credentials before running the migrations.

## Requirements
- PHP >= 7.0.0
- Laravel >= 5.5.0
- Fileinfo PHP Extension

## Languages and Tools
<p align="center"> <a href="https://getbootstrap.com" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/bootstrap/bootstrap-plain-wordmark.svg" alt="bootstrap" width="40" height="40"/> </a> <a href="https://www.chartjs.org" target="_blank" rel="noreferrer"> <img src="https://www.chartjs.org/media/logo-title.svg" alt="chartjs" width="40" height="40"/> </a> <a href="https://www.w3schools.com/css/" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/css3/css3-original-wordmark.svg" alt="css3" width="40" height="40"/> </a> <a href="https://www.figma.com/" target="_blank" rel="noreferrer"> <img src="https://www.vectorlogo.zone/logos/figma/figma-icon.svg" alt="figma" width="40" height="40"/> </a> <a href="https://www.w3.org/html/" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/html5/html5-original-wordmark.svg" alt="html5" width="40" height="40"/> </a> <a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/javascript/javascript-original.svg" alt="javascript" width="40" height="40"/> </a> <a href="https://laravel.com/" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/laravel/laravel-plain-wordmark.svg" alt="laravel" width="40" height="40"/> </a> <a href="https://www.mysql.com/" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/mysql/mysql-original-wordmark.svg" alt="mysql" width="40" height="40"/> </a> <a href="https://nodejs.org" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/nodejs/nodejs-original-wordmark.svg" alt="nodejs" width="40" height="40"/> </a> <a href="https://www.php.net" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/php/php-original.svg" alt="php" width="40" height="40"/> </a> <a href="https://tailwindcss.com/" target="_blank" rel="noreferrer"> <img src="https://www.vectorlogo.zone/logos/tailwindcss/tailwindcss-icon.svg" alt="tailwind" width="40" height="40"/> </a> <a href="https://www.tensorflow.org" target="_blank" rel="noreferrer"> <img src="https://www.vectorlogo.zone/logos/tensorflow/tensorflow-icon.svg" alt="tensorflow" width="40" height="40"/> </a> </p>
