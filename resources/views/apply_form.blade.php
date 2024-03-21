@extends('layouts.master')
@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif

    @if (Session::has('error'))
        <div class="alert alert-danger">
            {{ Session::get('error') }}
        </div>
    @endif
    <main class="main mb-3">
        <div class="container">
            <h2 class="u-text u-text-custom-color-1 u-text-default u-text-1">Applied for:{{ $job->title }}</h2>
            <div class="row single">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card__body">
                            <h4 class="card__head">As our company is rebranding, we have put in an effort to revamp our job
                                application site as well. Applying for a job had never been easier. Introducing new and
                                improved site, created just to simplify your job applying process. It’s fast, it’s simple
                                and it’s hassle free.<br>
                                <br>

                                So what are you waiting for? Drop your CV today!!
                            </h4>
                            <form action="{{ route('job-applications.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="career_id" value="{{ $job->id }}">
                                <div class="form-group">
                                    <label for="full_name">Full Name*</label>
                                    <input type="text" class="form-control" id="full_name" name="full_name" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email Address*</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="permanent_address">Permanent Address*</label>
                                    <input type="text" class="form-control" id="permanent_address"
                                        name="permanent_address" required>
                                </div>
                                <div class="form-group">
                                    <label for="temporary_address">Temporary Address*</label>
                                    <input type="text" class="form-control" id="temporary_address"
                                        name="temporary_address" required>
                                </div>
                                <div class="form-group">
                                    <label for="contact_number">Contact Number*</label>
                                    <input type="text" class="form-control" id="contact_number" name="contact_number"
                                        pattern="\d+" required>
                                </div>
                                <div class="form-group">
                                    <label for="expertise">Expertise*</label>
                                    <div id="expertiseFields">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="expertise"
                                                name="expertise[0][name]" placeholder="e.g., PHP Developer" required>
                                            <input type="number" class="form-control" id="expertise"
                                                name="expertise[0][experience]" placeholder="Months of Experience" required>
                                            <button type="button" class="btn btn-secondary" id="addExpertiseField">Add
                                                More</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="preferred">Preferred*</label>
                                    <select class="form-control" id="preferred" name="preferred" required>
                                        <option value="Laravel Developer">Laravel Developer</option>
                                        <option value=".NET Developer">.NET Developer</option>
                                        <option value="Linux Administrator">Linux Administrator</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="cover_letter">Cover Letter</label>
                                    <textarea class="form-control" id="cover_letter" name="cover_letter"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="resume">Resume*</label>
                                    <input type="file" class="form-control" id="resume" name="resume"
                                        accept=".pdf,.doc,.docx" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Apply Now</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        // Counter to keep track of added expertise fields
        let expertiseCounter = 1;

        // Function to add a new expertise field
        function addExpertiseField() {
            const expertiseFields = document.getElementById("expertiseFields");

            // Create a new input group for expertise
            const newExpertiseField = document.createElement("div");
            newExpertiseField.className = "input-group";

            // Create input for expertise name
            const expertiseNameInput = document.createElement("input");
            expertiseNameInput.type = "text";
            expertiseNameInput.className = "form-control";
            expertiseNameInput.name = `expertise[${expertiseCounter}][name]`;
            expertiseNameInput.placeholder = "e.g., PHP Developer";
            expertiseNameInput.required = true;

            // Create input for months of experience
            const expertiseExperienceInput = document.createElement("input");
            expertiseExperienceInput.type = "number";
            expertiseExperienceInput.className = "form-control";
            expertiseExperienceInput.name = `expertise[${expertiseCounter}][experience]`;
            expertiseExperienceInput.placeholder = "Months of Experience";
            expertiseExperienceInput.required = true;

            // Create a button to remove the expertise field
            const removeButton = document.createElement("button");
            removeButton.type = "button";
            removeButton.className = "btn btn-danger";
            removeButton.textContent = "Remove";
            removeButton.addEventListener("click", function() {
                expertiseFields.removeChild(newExpertiseField);
            });

            // Add expertise name input, experience input, and remove button to the new input group
            newExpertiseField.appendChild(expertiseNameInput);
            newExpertiseField.appendChild(expertiseExperienceInput);
            newExpertiseField.appendChild(removeButton);

            // Append the new expertise field to the expertiseFields container
            expertiseFields.appendChild(newExpertiseField);

            // Increment the expertiseCounter
            expertiseCounter++;
        }

        // Add an event listener to the "Add More" button
        const addExpertiseButton = document.getElementById("addExpertiseField");
        addExpertiseButton.addEventListener("click", addExpertiseField);
    </script>
@endsection
