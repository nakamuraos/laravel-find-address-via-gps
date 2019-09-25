@extends('client.app')
@section('content')
<div class="page-header header-filter" style="background-image: url('../client/assets/img/breadcrumb_bg.jpg'); background-size: cover; background-position: top center;"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 ml-auto mr-auto" id="register">
                <div class="card card-login">
                    <form class="form" method="POST" action="/register">
                        @csrf
                        <div class="card-header card-header-primary text-center">
                            <h4 class="card-title">Register</h4>
                            <div class="social-line">
                            </div>
                        </div>

                        <div class="card-body mt-5" style="height:450px">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="user"
                                            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                            class="svg-inline--fa fa-user fa-w-14 fa-3x">
                                            <path fill="currentColor"
                                                d="M313.6 304c-28.7 0-42.5 16-89.6 16-47.1 0-60.8-16-89.6-16C60.2 304 0 364.2 0 438.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-25.6c0-74.2-60.2-134.4-134.4-134.4zM400 464H48v-25.6c0-47.6 38.8-86.4 86.4-86.4 14.6 0 38.3 16 89.6 16 51.7 0 74.9-16 89.6-16 47.6 0 86.4 38.8 86.4 86.4V464zM224 288c79.5 0 144-64.5 144-144S303.5 0 224 0 80 64.5 80 144s64.5 144 144 144zm0-240c52.9 0 96 43.1 96 96s-43.1 96-96 96-96-43.1-96-96 43.1-96 96-96z"
                                                class=""></path>
                                        </svg>
                                    </span>
                                </div>
                                <input type="text" name="user_name" class="form-control" placeholder="UserName...">
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <svg aria-hidden="true" focusable="false" data-prefix="far"
                                            data-icon="smile-beam" role="img" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 496 512" class="svg-inline--fa fa-smile-beam fa-w-16 fa-3x">
                                            <path fill="currentColor"
                                                d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm0 448c-110.3 0-200-89.7-200-200S137.7 56 248 56s200 89.7 200 200-89.7 200-200 200zm84-143.4c-20.8 25-51.5 39.4-84 39.4s-63.2-14.3-84-39.4c-8.5-10.2-23.6-11.5-33.8-3.1-10.2 8.5-11.5 23.6-3.1 33.8 30 36 74.1 56.6 120.9 56.6s90.9-20.6 120.9-56.6c8.5-10.2 7.1-25.3-3.1-33.8-10.2-8.4-25.3-7.1-33.8 3.1zM136.5 211c7.7-13.7 19.2-21.6 31.5-21.6s23.8 7.9 31.5 21.6l9.5 17c2.1 3.7 6.2 4.7 9.3 3.7 3.6-1.1 6-4.5 5.7-8.3-3.3-42.1-32.2-71.4-56-71.4s-52.7 29.3-56 71.4c-.3 3.7 2.1 7.2 5.7 8.3 3.4 1.1 7.4-.5 9.3-3.7l9.5-17zM328 152c-23.8 0-52.7 29.3-56 71.4-.3 3.7 2.1 7.2 5.7 8.3 3.5 1.1 7.4-.5 9.3-3.7l9.5-17c7.7-13.7 19.2-21.6 31.5-21.6s23.8 7.9 31.5 21.6l9.5 17c2.1 3.7 6.2 4.7 9.3 3.7 3.6-1.1 6-4.5 5.7-8.3-3.3-42.1-32.2-71.4-56-71.4z"
                                                class=""></path>
                                        </svg>
                                    </span>
                                </div>
                                <input type="text" name="full_name" class="form-control" placeholder="Fullname...">
                            </div>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <svg aria-hidden="true" focusable="false" data-prefix="fas"
                                            data-icon="phone-alt" role="img" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512" class="svg-inline--fa fa-phone-alt fa-w-16 fa-3x">
                                            <path fill="currentColor"
                                                d="M497.39 361.8l-112-48a24 24 0 0 0-28 6.9l-49.6 60.6A370.66 370.66 0 0 1 130.6 204.11l60.6-49.6a23.94 23.94 0 0 0 6.9-28l-48-112A24.16 24.16 0 0 0 122.6.61l-104 24A24 24 0 0 0 0 48c0 256.5 207.9 464 464 464a24 24 0 0 0 23.4-18.6l24-104a24.29 24.29 0 0 0-14.01-27.6z"
                                                class=""></path>
                                        </svg>
                                    </span>
                                </div>
                                <input type="text" name="phone" class="form-control" placeholder="Phone...">
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="envelope"
                                            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                            class="svg-inline--fa fa-envelope fa-w-16 fa-3x">
                                            <path fill="currentColor"
                                                d="M464 64H48C21.49 64 0 85.49 0 112v288c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V112c0-26.51-21.49-48-48-48zm0 48v40.805c-22.422 18.259-58.168 46.651-134.587 106.49-16.841 13.247-50.201 45.072-73.413 44.701-23.208.375-56.579-31.459-73.413-44.701C106.18 199.465 70.425 171.067 48 152.805V112h416zM48 400V214.398c22.914 18.251 55.409 43.862 104.938 82.646 21.857 17.205 60.134 55.186 103.062 54.955 42.717.231 80.509-37.199 103.053-54.947 49.528-38.783 82.032-64.401 104.947-82.653V400H48z"
                                                class=""></path>
                                        </svg>
                                    </span>
                                </div>
                                <input type="email" name="email" class="form-control" placeholder="Email...">
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="lock-alt"
                                            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                            class="svg-inline--fa fa-lock-alt fa-w-14 fa-3x">
                                            <path fill="currentColor"
                                                d="M224 412c-15.5 0-28-12.5-28-28v-64c0-15.5 12.5-28 28-28s28 12.5 28 28v64c0 15.5-12.5 28-28 28zm224-172v224c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V240c0-26.5 21.5-48 48-48h32v-48C80 64.5 144.8-.2 224.4 0 304 .2 368 65.8 368 145.4V192h32c26.5 0 48 21.5 48 48zm-320-48h192v-48c0-52.9-43.1-96-96-96s-96 43.1-96 96v48zm272 48H48v224h352V240z"
                                                class=""></path>
                                        </svg>
                                    </span>
                                </div>
                                <input type="password" name="password" class="form-control" placeholder="Password...">
                            </div>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <svg aria-hidden="true" focusable="false" data-prefix="far"
                                            data-icon="check-square" role="img" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 448 512" class="svg-inline--fa fa-check-square fa-w-14 fa-3x">
                                            <path fill="currentColor"
                                                d="M400 32H48C21.49 32 0 53.49 0 80v352c0 26.51 21.49 48 48 48h352c26.51 0 48-21.49 48-48V80c0-26.51-21.49-48-48-48zm0 400H48V80h352v352zm-35.864-241.724L191.547 361.48c-4.705 4.667-12.303 4.637-16.97-.068l-90.781-91.516c-4.667-4.705-4.637-12.303.069-16.971l22.719-22.536c4.705-4.667 12.303-4.637 16.97.069l59.792 60.277 141.352-140.216c4.705-4.667 12.303-4.637 16.97.068l22.536 22.718c4.667 4.706 4.637 12.304-.068 16.971z"
                                                class=""></path>
                                        </svg>
                                    </span>
                                </div>
                                <input type="password" name="password_confirmation" class="form-control"
                                    placeholder="Confirm Password...">
                            </div>
                        </div>
                        <div class="footer text-center">
                            <button type="submit" class="btn btn-primary btn-link btn-wd btn-lg">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
