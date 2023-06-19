<?php include('complaintLecturerHeader.php'); ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-center mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Complaint Form</h1>

                    </div>
<!-- Content Row -->
<div class="row justify-content-center">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Complaint Type</h6>
        </div>
        <div class="card-body">
            <form method="post" action="complaint-back.php">
                <div class="form-group">
                    <label for="answer_id">Answer ID:</label>
                    <input type="text" class="form-control" id="answer_id" name="answer_id" required>
                </div>
                <div class="form-group">
                    <label for="type">Complaint Type</label>
                    <select class="form-control" id="type" name="type" required>
                        <option value="Unsatisfied Expert's Feedback">Unstatisfied Expert's Feedback</option>
                        <option value="Wrongly Assigned Research Area">Wrongly Assigned Research Area</option>
                        <option value="Technical Problems">Technical Problems</option>
                        <option value="Plagiarism or Academic Misconduct">Plagiarism or Academic Misconduct</option>
                        <option value="Others">Others</option>
                    </select>
                </div>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Complaint Description</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <textarea class="form-control" id="description" name="description" rows="7" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
<!-- End of Main Content -->

<?php include('complaint-footer.php'); ?>