<div class="page-section">
    <div class="container">
        <h1 class="text-center wow fadeInUp">Make an Appointment</h1>
        <form class="main-form" action="{{ url('appointment') }}" method="POST">
            @csrf
            <div class="row mt-5 ">
                <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                    <input type="text" name="name" class="form-control" placeholder="Full name"
                        value="{{ old('name') }}">
                    @error('name')
                        <div class="col-auto">
                            <span id="nameHelpInline" class="form-text">
                                {{ $message }}
                            </span>
                        </div>
                    @enderror
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                    <input type="text" name="email" class="form-control" placeholder="Email address.."
                        value="{{ old('email') }}">
                    @error('email')
                        <div class="col-auto">
                            <span id="emailHelpInline" class="form-text">
                                {{ $message }}
                            </span>
                        </div>
                    @enderror
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
                    <input type="date" name="date" class="form-control" value="{{ old('date') }}">
                    @error('date')
                        <div class="col-auto">
                            <span id="dateHelpInline" class="form-text">
                                {{ $message }}
                            </span>
                        </div>
                    @enderror
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
                    <select name="doctor" id="departement" class="custom-select">
                        <option value="-1">--Select--</option>
                        @foreach ($doctors as $doctor)
                            <option value="{{ $doctor->name }}"
                                {{ old('doctor') == $doctor->name ? 'selected' : '' }}>
                                {{ $doctor->name }} -
                                {{ $doctor->specialization }}</option>
                        @endforeach
                    </select>
                    @error('doctor')
                        <div class="col-auto">
                            <span id="nameHelpInline" class="form-text">
                                {{ $message }}
                            </span>
                        </div>
                    @enderror
                </div>
                <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                    <input type="text" name="phone" class="form-control" placeholder="Number.."
                        value="{{ old('phone') }}">
                    @error('phone')
                        <div class="col-auto">
                            <span id="nameHelpInline" class="form-text">
                                {{ $message }}
                            </span>
                        </div>
                    @enderror
                </div>
                <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                    <textarea name="message" name="message" id="message" class="form-control" rows="6"
                        placeholder="Enter message.." value="{{ old('message') }}"></textarea>
                    @error('message')
                        <div class="col-auto">
                            <span id="nameHelpInline" class="form-text">
                                {{ $message }}
                            </span>
                        </div>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Submit Request</button>
        </form>
    </div>
</div> <!-- .page-section -->
