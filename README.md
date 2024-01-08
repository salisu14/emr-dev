# EMR - Electronic Medical Record

## Requirements

Make sure your server meets the following requirements.

-   Apache 2.2+ or nginx
-   MySQL Server 5.7.8+ , Mariadb 10.3.2+ or PostgreSQL
-   Composer installed 2.0+
-   PHP Version 8.0.x+


### PHP extensions

The following php extensions must be enabled for the application to work

```
bz2, curl, date, dom, exif, gd, gettext, grpc,
imagick, intl, json, libxml, mbstring, mysqli, mysqlnd, openssl, pcntl, PDO,
pdo_mysql, posix, protobuf, redis, soap, sqlite3, xml, xmlreader, xmlwriter
xsl, zip, zlib
```
For more information enabaling these extension, please visit [here](https://www.php.net/manual/en/install.pecl.windows.php)

## Installation

Install composer with the help of the instructions given [here](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-macos)

```bash
$ wget https://getcomposer.org/composer.phar
$ chmod +x composer.phar
$ mv composer.phar /usr/local/bin/composer
```

Install Node.js/NPM with the help of the instructions given [here](https://nodejs.org/en/download/package-manager/)

Linux/Unix `yum install npm` OR using MacOs `brew install node`

Fork and/or clone this project by running the following command

```bash
$ git clone https://github.com/ibrahimsafiyan/emr-dev.git
```

Navigate into the project's directory

```bash
$ cd emr-dev
```

Copy .env.example for .env and modify according to your credentials

```bash
cp .env.example .env
```

Run this command to install dependencies

```bash
composer install --prefer-dist
```

This command will install all dependencies needed to run the EMR successfully!

Generate application key

```bash
php artisan key:generate
```

Install npm/yarn dependencies (Preference is using **Yarn**)

```bash
npm install or yarn install
```

This command will help migrate the database and populate the database!

```bash
php artisan migrate --seed
```

Or if for any reason, you wish to reset the database later, you can run

```bash
php artisan migrate:fresh --seed
```

## Usage

Run yarn/npm in dev mode
`npm run dev` OR `yarn run dev`

For live building of components while developing, you can run

`npm run watch` OR `npm run watch-poll`

Run the default laravel server

```bash
php artisan serve
```

To view the EMR Application, open the following link in your browser:

```php
http://localhost:8000/
```

If you want to serve to another port for example (3000), Run the following

```bash
php artisan serve --host=<your_ip_address> --port=3000
```

Then view it on the browser by typing `http://<your_ip_address>:3000`

## Database design

- Patients:
* PatientID (PK): INT
* Name: VARCHAR(255)
* DateOfBirth: DATE
* Gender: VARCHAR(10)
* Address: VARCHAR(255)
* PhoneNumber: VARCHAR(15)
* InsuranceInformation: TEXT
* EmergencyContactInformation: TEXT

- Providers:
* ProviderID (PK): INT
* Name: VARCHAR(255)
* Specialty: VARCHAR(255)
* Credentials: VARCHAR(255)
* ContactInformation: VARCHAR(255)

- Appointments:
* AppointmentID (PK): INT
* PatientID (FK): INT
* ProviderID (FK): INT
* Date: DATE
* Time: TIME
* ReasonForVisit: TEXT
* Status: VARCHAR(20)

- MedicalHistory:
* MedicalHistoryID (PK): INT
* PatientID (FK): INT
* PastIllnesses: TEXT
* Surgeries: TEXT
* Medications: TEXT
* Allergies: TEXT
* Immunizations: TEXT

- LabResults:
* LabResultID (PK): INT
* PatientID (FK): INT
* TestName: VARCHAR(255)
* DateOrdered: DATE
* DateResultReceived: DATE
* ResultValue: VARCHAR(50)
* ReferenceRange: VARCHAR(50)

- Medications:
* MedicationID (PK): INT
* Name: VARCHAR(255)
* Dosage: VARCHAR(50)
* Frequency: VARCHAR(50)
* Instructions: TEXT

- Prescriptions:
* PrescriptionID (PK): INT
* PatientID (FK): INT
* MedicationID (FK): INT
* ProviderID (FK): INT
* DatePrescribed: DATE
* Quantity: INT
* Refills: INT

- Notes:
* NoteID (PK): INT
* PatientID (FK): INT
* Date: DATE
* Author (Provider): VARCHAR(255)
* TypeOfNote: VARCHAR(50)
* Content: TEXT