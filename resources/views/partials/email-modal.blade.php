<div class="modal fade" id="signup-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form method="post" action="{{ route_lang('ico-post') }}">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Enter email to get <strong>BitDegree Tokens</strong></h4>
                </div>
                <div class="modal-body" id="modal-agreements">

                        <div class="form-group">
                            <label for="input-email">Your Email</label>
                            <input type="email" class="form-control" value="" name="email" placeholder="you@example.com" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Get Tokens Now</button>
                </div>
            </div>
        </form>
    </div>
</div>