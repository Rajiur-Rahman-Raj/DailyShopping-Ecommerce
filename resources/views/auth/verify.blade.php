@extends('layouts.emailverified')

@section('emailverify_content')
  <div class="full_wrapper">
		<div class="container">
			<div class="row">
				<div class="col-md-12 verifi_msg">
					<div class="card">
						<div class="card-header">
							<h4 class="text-dard">{{ __(' দয়া করে আগে আপনার ইমেইলটি ভেরিফিকেশন কুরুন ') }}</h4>
						</div>
						<div class="card-body">
              @if (session('resent'))
                  <div class="alert alert-success" role="alert">
                      {{ __('আপনার ইমেইল এ একটি ভেরিফিকেশন লিঙ্ক চলে গেছে, দয়া করে ইমেইলটি ভেরিফাইড করুন.') }}
                  </div>
              @endif

              {{ __('আগে আপনার ইমেইলটি চেক করুন') }}
              {{ __('যদি আপনার ইমেইল এ কোন ভেরিফিকেশন লিঙ্ক না যাই তাহলে এখানে') }}, <a href="{{ route('verification.resend') }}">{{ __('click here ক্লিক করুন') }}</a>.
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
@endsection
