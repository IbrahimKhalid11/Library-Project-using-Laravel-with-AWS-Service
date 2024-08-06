# Project Library By Laraval and Connect By EC2 and RDS

## Introduction
This project is a web application designed to manage Library and increase productivity. User can add, update, make invoice, see invoices history, delete Books and Connect by AWS Service

## Features
- Book add, editing, and deletion
- Make Invoice
- Monitoring invoice records
- EC2 and RDS connection

## Installation
1. Clone the repository:
   ```bash
   https://github.com/IbrahimKhalid11/Library.git

2. Edit APP_URL on .env
    ```bash
    APP_NAME=Laravel
    APP_ENV=local
    APP_KEY=base64:6YpHWMoi4lv5D4FijWkIzFWMGIpP8SA+N7H38k9rlPE=
    APP_DEBUG=true
    APP_URL=IP-Public from EC2

3. Edit DB_HOST on .env
   ```bash
    DB_CONNECTION=mysql
    DB_HOST= Endpoint from RDS
    DB_PORT=3306
    DB_DATABASE=library
    DB_USERNAME=root
    DB_PASSWORD=root1234

    
