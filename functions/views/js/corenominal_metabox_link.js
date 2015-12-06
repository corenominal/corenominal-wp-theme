jQuery(document).ready(function($)
{
	/**
	 * Move the metabox above the rich editor
	 */
	var html = $('#corenominal_metabox_link').html();
	if( html != undefined )
	{
		$('#corenominal_metabox_link').remove();
		$('#postdivrich').before('<div id="corenominal_metabox_link" class="postbox corenominal_metabox_link">' + html + '</div>');
	}
});