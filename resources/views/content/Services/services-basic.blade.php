@extends('layouts/contentNavbarLayout')

@section('title', 'Services - All Services')

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/masonry/masonry.js') }}"></script>
@endsection

<style>
    /* Modal styles */
    .modal-content {
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .gig-details {
        display: flex;
        align-items: center;
    }

    .gig-image {
        flex: 1;
        max-width: 200px;
    }

    .gig-image img {
        width: 100%;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    .gig-description {
        flex: 2;
        padding: 20px;
    }

    .gig-description h3 {
        font-size: 24px;
        margin: 0;
        color: #333;
    }

    .gig-description p {
        font-size: 16px;
        color: #666;
    }

    .gig-meta {
        display: flex;
        justify-content: space-between;
        margin-top: 10px;
    }

    .price {
        font-size: 20px;
        color: #00c853;
    }

    .delivery-time {
        font-size: 16px;
        color: #666;
    }

    .gig-extra-details {
        margin-top: 20px;
    }

    .ratings {
        font-size: 18px;
        color: #ff5722;
    }

    .attachments ul {
        list-style: none;
        padding: 0;
    }

    .attachments li {
        margin-bottom: 10px;
    }

    /* Add more styling as needed */
</style>
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Services</h4>

    <!-- Examples -->
    <div class="row mb-5">
        @foreach ($services as $service)
            <div class="col-md-6 col-lg-4 mb-3">
                <div class="card h-100">
                    <!-- Replace 'img/src' and 'card-title' and 'card-text' with actual fields from your Service model -->
                    <img class="card-img-top" src="{{ asset('assets/img/elements/2.jpg') }}" alt="Card image cap" height="200"
                        width="200" />
                    <div class="card-body">
                        <h5 class="card-title">{{ $service->title }}</h5>
                        <p class="card-text">{{ $service->description }}</p>
                        <p class="card-text">{{ $service->price }}</p>
                        <p class="card-text">{{ $service->average_rating }}</p>
                        <p class="card-text">{{ $service->user_name }}</p>

                        <div class="skills-container d-flex flex-wrap">
                            @foreach ($skills as $skill)
                                <span class="badge bg-primary me-1 mb-1">{{ $skill->skillName }}</span>
                            @endforeach
                        </div>
                        <br />
                        <br />
                        <div class="modal fade" id="modalScrollable-{{ $service->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalScrollableTitle">{{ $service->title }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="gig-details">
                                            <div class="gig-image">
                                                <img src="{{ asset('assets/img/elements/2.jpg') }}"
                                                    alt="{{ $service->title }}" />
                                            </div>
                                            <div class="gig-description">
                                                <h3>{{ $service->title }}</h3>
                                                <p>{{ $service->description }}</p>
                                                <div class="gig-meta">
                                                    <p class="price">${{ $service->price }}</p>
                                                    <p class="delivery-time">{{ $service->delivery_time }} days</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="gig-extra-details">
                                            <div class="ratings">
                                                <p>Average Rating: {{ $service->average_rating }}/5</p>
                                            </div>
                                            <div class="attachments">
                                                <h4>Attachments:</h4>
                                                <ul>
                                                    @foreach ($service->attachments as $attachment)
                                                        <li>
                                                            <a href="#">
                                                                {{ $attachment->filename }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div class="user-details">
                                                <h4>Freelancer Details:</h4>
                                                <p>Freelancer Name: {{ $service->user->name }}</p>
                                                <p>Email: {{ $service->user->email }}</p>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Place An order </button>
                                    </div>
                                </div>




                            </div>
                        </div>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#modalScrollable-{{ $service->id }}">
                            More Info
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>



@endsection
