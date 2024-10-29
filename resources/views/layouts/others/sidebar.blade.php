<div style="width: 1%; top: 0; right: 0">
    <div id="rightbar" class="rightbar h-100 w-100 d-inline-block d-md-none" style="margin-left: 100%;">
        <span class="font-weight-bolder ml-3" id="close" style="font-size: 14pt">&times;</span>
        <ul>
            @foreach ($getcategory as $gc)
            <li class="d-flex justify-content-start">
                <div style="width:30px">
                    <i class="fi-xnsxxm-codeigniter"></i>
                </div>
                <span><a href="{{ url('category/'.$gc['category_id']) }}">{{ ucfirst($gc['title']) }}</a></span>
            </li>
            @endforeach
            <h4 class="title mt-3">Lainnya</h4>
            <li class="d-flex justify-content-start">
                <div style="width:30px">
                    <i class="fi-xnsxxm-tools-solid"></i>
                </div>
                <span>Pengaturan</span>
            </li>
        </ul>
        <div class="d-flex justify-content-end">
            <label for="theme" class="mb-0">
                <div id="themelbl"></div>
            </label>
            <input type="checkbox" id="theme" style="visibility: hidden" />
        </div>
    </div>
</div>