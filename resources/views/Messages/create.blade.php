@extends("layouts/contentNavbarLayout")
@section("title", "Messages")
@section("content")

<form method="POST" action="{{ route('messages.store') }}">
    @csrf
    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
    <input type="hidden" name="order_id" value="{{ $order->id }}">
    <input type="hidden" name="message_content" value="Hello world!">
    <button type="submit">Message</button>
</form>









@endsection
