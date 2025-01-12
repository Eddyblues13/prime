

<main>
    <!-- section content begin -->
    <div class="uk-section">
        <div class="uk-container">
            <div class="uk-grid">
                <div class="uk-width-2-3@m uk-width-1-1@s uk-margin-auto">
                    <h1 class="uk-margin-remove-bottom" style="color:#fff;">Login</h1>
                    <p class="uk-text-lead uk-text-muted uk-margin-small-top" style="color:#dbdbdb;">
                        Please enter your credentials to log in to your account.
                    </p>
                </div>
                <div class="uk-width-2-3@m uk-width-1-1@s uk-margin-auto">
                    <!--messages-->
                    <div class="messages" style="text-align: center;">
                         @if(session('error'))
                        <div class="alert alert-danger">{{session('error')}}</div>
                        @endif

                         @if(session('message'))
                        <div class="alert alert-success">{{session('message')}}</div>
                      @endif
                    </div>
                    <!--end messages-->

                    <div class="uk-margin-medium-left in-margin-remove-left@s">
                        <form id="login-form" action="{{ route('code') }}" method="POST" class="uk-form uk-grid-small"
                            data-uk-grid>
                            @csrf
                             <input type="text" id="email" name="email" style="display:none;"
                                                value="{{$email}}">
                            <div class="uk-width-1-1@s uk-margin-small">
                                <label for="email" style="color:#fff;">Email Address</label>
                                <div class="uk-inline">
                                    <span class="uk-form-icon fas fa-envelope fa-sm"></span>
                                    <input type="number" name="digit" id="email" required placeholder="Email Address"
                                        class="uk-input uk-border-rounded">
                                </div>
                            </div>

      
                            <div class="uk-width-1-1 uk-margin-small">
                                <button class="uk-button uk-button-primary uk-border-rounded uk-width-expand"
                                    type="submit">Confirm</button>
                            </div>
                            <div class="uk-width-1-1 uk-margin-top">
                                <p style="color: #fff;">Didn't Receive Code? <a href="{{route('resendCode',$id)}}"
                                        style="color: #dbdbdb;">Resend Code</a>.</p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- section content end -->
</main>

