<style>
    .meta {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 0 20px;
    }

    .meta a {
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
    }

</style>

<div class="page-section">
    <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp">Our Doctors</h1>

        <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">
            @foreach ($doctors as $doctor)
                <div class="item">
                    <div class="card-doctor">
                        <div class="header">
                            <img height="300" src="doctorImg/{{ $doctor->image }}" alt="Doctor Image">
                            <div class="meta">
                                <a href="#"><span class="mai-call"></span></a>
                                <a href="#"><span class="mai-logo-whatsapp"></span></a>
                            </div>
                        </div>
                        <div class="body">
                            <p class="text-xl mb-0">{{ $doctor->name }}</p>
                            <span class="text-sm text-grey">{{ $doctor->specialization }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
