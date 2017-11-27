<div class="modal fade" id="signup-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form method="post" action="{{ route('ico-post') }}">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Enter email to get<br> <strong>BitDegree Tokens</strong></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="email" data-validate="email"class="form-control" value="" name="email" placeholder="Your email" id="input-email"required>
                        <div class="text-danger validation">Email is not valid.</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Get Tokens Now</button>
                </div>
            </div>
        </form>
    </div>
</div>

@include('partials.validation')