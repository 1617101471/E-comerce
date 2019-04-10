<div class="modal fade" id="blog-content{{$data->id}}" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-body blog-single-modal">  
                  <h3>{{$data->judul}}</h3>
                    <div class="post-meta">
                        <ul>
                            <li><i class="fa fa-calendar-o"></i>{{ $data->created_at}}</li>
                            <li><i class="fa fa-thumb-tack"></i>{{$data->user->name}}</li>
                        </ul>
                    </div>
                <img src="{{ asset('/assets/img/gambar/' .$data->gambar)}}" alt="">
                <p>{!! $data->content !!}</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn btn-primary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>