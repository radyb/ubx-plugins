<?php
 
class ask_widget
{
	// See http://docs.question2answer.org/plugins/modules-widget/
	
	public function allow_template($template)
	{
		$allowed = array(
			'qa', 'questions', 'hot', 'serach', 'tag', 'unanswered'
		);
		return in_array($template, $allowed);
	}

	public function allow_region($region)
	{
		return in_array($region, array('main', 'side', 'full'));
	}

	public function output_widget($region, $place, $themeobject, $template, $request, $qa_content)
	{
		if (isset($qa_content['categoryids']))
			$params=array('cat' => end($qa_content['categoryids']));
		else
			$params=null;
?>
<div class="qa-ask-box">
	<form method="post" action="<?php echo qa_path_html('ask', $params); ?>">
		<table class="qa-form-tall-table" style="width:100%">
			
			<tr>	
			
				<td class="qa-form-tall-data" style="padding:8px;" width="">
					<input name="title" type="text" placeholder="Ask a question" class="qa-form-tall-text">
					<input class="qa-form-tall-button ask-button" type="submit" value="request"/>
				</td>
			</tr>
			<tr style="vertical-align:middle;">
				<td class="qa-form-tall-label alert" style="padding:8px; white-space:nowrap; 'text-align:left;" width="1">
					
					<span class="alert-icon"></span>Please always ask in English
				</td>
			</tr>
		</table>
		<input type="hidden" name="doask1" value="1">
	</form>
</div>
<?php if (qa_is_logged_in() == false) { ?>

 <H2>New to Communities?<H2><a class="btn btn-success" href="<?php echo qa_path_html('register'); ?>">Join the community</a>

<?php } 
	}
}
