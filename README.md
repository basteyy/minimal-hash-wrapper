# minimal-hash-wrapper
A minimal (static) class for hashing and verifying passwords

## Setup 

```bash
composer require basteyy/minimal-hash-wrapper
```

## Usage

Create the hash of a password

```php
$userPassword = 'foobar';
$userPasswordHashed = \basteyy\MinimalHashWrapper\MinimalHashWrapper::getHash($userPassword);
```

Compare hash and a password

```php
if(\basteyy\MinimalHashWrapper\MinimalHashWrapper::compare(
    $_POST['password'], // From a form for example
    $user->password // From a database for example
)) {
    echo 'Password was correct. Welcome back user!';
} else {
    echo 'Okay cowboy .. something is wrong';
}
```