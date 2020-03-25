@if($marketingsettings->google_tagmanager_code != '')
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id={{ $marketingsettings->google_tagmanager_code }}" height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
@endif
