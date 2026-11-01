# Routes Documentation

## up

- **Methods:** GET|HEAD
- **Name:** N/A
- **Action:** Closure

## /

- **Methods:** GET|HEAD
- **Name:** N/A
- **Action:** Closure

## events

- **Methods:** GET|HEAD
- **Name:** events.index
- **Action:** App\Http\Controllers\EventController@index

## events/create

- **Methods:** GET|HEAD
- **Name:** events.create
- **Action:** App\Http\Controllers\EventController@create

## events

- **Methods:** POST
- **Name:** events.store
- **Action:** App\Http\Controllers\EventController@store

## events/{event}/edit

- **Methods:** GET|HEAD
- **Name:** events.edit
- **Action:** App\Http\Controllers\EventController@edit

## events/{event}

- **Methods:** PUT
- **Name:** events.update
- **Action:** App\Http\Controllers\EventController@update

## events/{event}

- **Methods:** PATCH
- **Name:** events.update
- **Action:** App\Http\Controllers\EventController@update

## events/{event}

- **Methods:** DELETE
- **Name:** events.destroy
- **Action:** App\Http\Controllers\EventController@destroy

## events/{event}

- **Methods:** GET|HEAD
- **Name:** events.show
- **Action:** App\Http\Controllers\EventController@show

## performers

- **Methods:** GET|HEAD
- **Name:** performers.index
- **Action:** App\Http\Controllers\PerformerInfoController@index

## performers/create

- **Methods:** GET|HEAD
- **Name:** performers.create
- **Action:** App\Http\Controllers\PerformerInfoController@create

## performers

- **Methods:** POST
- **Name:** performers.store
- **Action:** App\Http\Controllers\PerformerInfoController@store

## performers/{performer}/edit

- **Methods:** GET|HEAD
- **Name:** performers.edit
- **Action:** App\Http\Controllers\PerformerInfoController@edit

## performers/{performer}

- **Methods:** PUT
- **Name:** performers.update
- **Action:** App\Http\Controllers\PerformerInfoController@update

## performers/{performer}

- **Methods:** PATCH
- **Name:** N/A
- **Action:** App\Http\Controllers\PerformerInfoController@update

## performers/{performer}

- **Methods:** DELETE
- **Name:** performers.destroy
- **Action:** App\Http\Controllers\PerformerInfoController@destroy

## performers/{performer}

- **Methods:** GET|HEAD
- **Name:** performers.show
- **Action:** App\Http\Controllers\PerformerInfoController@show

## contact

- **Methods:** GET|HEAD
- **Name:** contact.create
- **Action:** App\Http\Controllers\ContactMessageController@create

## contact

- **Methods:** POST
- **Name:** contact.store
- **Action:** App\Http\Controllers\ContactMessageController@store

## bookings

- **Methods:** GET|HEAD
- **Name:** bookings.index
- **Action:** App\Http\Controllers\BookingController@index

## bookings/create

- **Methods:** GET|HEAD
- **Name:** bookings.create
- **Action:** App\Http\Controllers\BookingController@create

## bookings

- **Methods:** POST
- **Name:** bookings.store
- **Action:** App\Http\Controllers\BookingController@store

## bookings/{booking}/edit

- **Methods:** GET|HEAD
- **Name:** bookings.edit
- **Action:** App\Http\Controllers\BookingController@edit

## bookings/{booking}

- **Methods:** PUT
- **Name:** bookings.update
- **Action:** App\Http\Controllers\BookingController@update

## bookings/{booking}

- **Methods:** DELETE
- **Name:** bookings.destroy
- **Action:** App\Http\Controllers\BookingController@destroy

## dashboard

- **Methods:** GET|HEAD
- **Name:** dashboard
- **Action:** Closure

## profile

- **Methods:** GET|HEAD
- **Name:** profile.edit
- **Action:** App\Http\Controllers\ProfileController@edit

## profile

- **Methods:** PATCH
- **Name:** profile.update
- **Action:** App\Http\Controllers\ProfileController@update

## profile

- **Methods:** DELETE
- **Name:** profile.destroy
- **Action:** App\Http\Controllers\ProfileController@destroy

## register

- **Methods:** GET|HEAD
- **Name:** register
- **Action:** App\Http\Controllers\Auth\RegisteredUserController@create

## register

- **Methods:** POST
- **Name:** N/A
- **Action:** App\Http\Controllers\Auth\RegisteredUserController@store

## login

- **Methods:** GET|HEAD
- **Name:** login
- **Action:** App\Http\Controllers\Auth\AuthenticatedSessionController@create

## login

- **Methods:** POST
- **Name:** N/A
- **Action:** App\Http\Controllers\Auth\AuthenticatedSessionController@store

## forgot-password

- **Methods:** GET|HEAD
- **Name:** password.request
- **Action:** App\Http\Controllers\Auth\PasswordResetLinkController@create

## forgot-password

- **Methods:** POST
- **Name:** password.email
- **Action:** App\Http\Controllers\Auth\PasswordResetLinkController@store

## reset-password/{token}

- **Methods:** GET|HEAD
- **Name:** password.reset
- **Action:** App\Http\Controllers\Auth\NewPasswordController@create

## reset-password

- **Methods:** POST
- **Name:** password.store
- **Action:** App\Http\Controllers\Auth\NewPasswordController@store

## verify-email

- **Methods:** GET|HEAD
- **Name:** verification.notice
- **Action:** App\Http\Controllers\Auth\EmailVerificationPromptController

## verify-email/{id}/{hash}

- **Methods:** GET|HEAD
- **Name:** verification.verify
- **Action:** App\Http\Controllers\Auth\VerifyEmailController

## email/verification-notification

- **Methods:** POST
- **Name:** verification.send
- **Action:** App\Http\Controllers\Auth\EmailVerificationNotificationController@store

## confirm-password

- **Methods:** GET|HEAD
- **Name:** password.confirm
- **Action:** App\Http\Controllers\Auth\ConfirmablePasswordController@show

## confirm-password

- **Methods:** POST
- **Name:** N/A
- **Action:** App\Http\Controllers\Auth\ConfirmablePasswordController@store

## password

- **Methods:** PUT
- **Name:** password.update
- **Action:** App\Http\Controllers\Auth\PasswordController@update

## logout

- **Methods:** POST
- **Name:** logout
- **Action:** App\Http\Controllers\Auth\AuthenticatedSessionController@destroy

## storage/{path}

- **Methods:** GET|HEAD
- **Name:** storage.local
- **Action:** Closure

## storage/{path}

- **Methods:** PUT
- **Name:** storage.local.upload
- **Action:** Closure

