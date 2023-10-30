@component('mail::message')
# Reset Password

Nhấn vào nút bên dưới để đặt lại mật khẩu mới.

@component('mail::button', ['url' => url('/reset-password', $token)])
Reset Password
@endcomponent

Nếu bạn không phải người yêu cầu đặt lại mật khẩu thì hãy bỏ qua mail này.

Cảm ơn bạn gất nhìu,
{{ config('app.name') }}
@endcomponent
