<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

**XITEB-PHARMACY-SYSTEM**

This is a simple solution for managing medical prescription uploads and quotations, developed using Laravel.

**Table of Contents**

*Introduction\
*Features\
*Installation\
*Usage\
*Screenshots\
*Contributing

**Introduction**\
This project provides a platform where users can upload their medical prescriptions and pharmacies can prepare and send quotations for the uploaded prescriptions. It consists of two user levels: User and Pharmacy.

**Features**\
   **Part A: User Functionalities**\
      **User Registration**: Users can register with the following fields:\
         Name\
         Email\
         Address\
         Contact Number\
         Date of Birth\
   **User Login**: Registered users can log in to the platform.\
   **Upload Prescription**: Users can upload up to 5 images of their prescription, along with\
     Note\
     Delivery address\
     Delivery time (2-hour time slots)\
   **Part B: Pharmacy Functionalities**\
   **View Uploaded Prescriptions**: Pharmacy user can view the prescriptions uploaded by users.\
   **Prepare Quotations**: Pharmacy users can prepare quotations for the uploaded prescriptions.\
   **Send Quotations to Users**: The prepared quotations are sent to the users and displayed in their accounts.\
   **Accept/Reject Quotations**: Users can accept or reject the quotations, and the pharmacy is notified of their decision.\

**Installation**

  To get a local copy up and running, follow these simple steps:

   **1.Clone the repo:**   git clone https://github.com/your_username/your_repo.git \
   **2.Install Composer dependencies**: composer install\
   **3.Create a copy of you .env file:**  cp .env.example .env\
   **4.Generate an application key:** php artisan key:generate\
   **5.Set up your database:**  Update your database credentials in your .env file.\
   **6.Run the database migrations:**  php artisan migrate\
   **7.Start the development server:**  php artisan serve\

**Usage**

   **1.Register as a User:** Navigate to the registration page and create a user account.\
   **2.Login as a User:** Log in with your credentials.\
   **3.Upload a Prescription:** Go to the prescription upload page, fill in the required fields, and upload your prescription images.\
   **4.Pharmacy Actions:** Log in as a pharmacy user, view the uploaded prescriptions, prepare quotations, and send them to users.\
   **5.Quotation Management:** Users can view the quotations, accept or reject them.\


**Screenshots**

**User Registration**

![profile](https://github.com/MohammedShabry/Pharmacy-Management-System/assets/99311998/b2e005ce-e8dc-40cb-8cb1-5374444f7432)

**Upload Prescription**
![prescriptionForm](https://github.com/MohammedShabry/Pharmacy-Management-System/assets/99311998/0c6aeaa3-c8ed-414d-9585-8ec075475b93)

**Quotation Details**
 ![quatation details 1](https://github.com/MohammedShabry/Pharmacy-Management-System/assets/99311998/2fe846d1-932e-432a-a532-2d0f2e4ff9fc)

**Prepare Quotation**
![quatationForm](https://github.com/MohammedShabry/Pharmacy-Management-System/assets/99311998/946d4faa-30e8-42f1-8e54-f584570b58fa)

**Add New Drug**
![addnewdrugForm](https://github.com/MohammedShabry/Pharmacy-Management-System/assets/99311998/1aa79fea-53a3-4786-830c-e48a998525fa)

**Display All Users**
![all users](https://github.com/MohammedShabry/Pharmacy-Management-System/assets/99311998/73b2c6aa-4309-462a-9543-d16124f1978a)






















