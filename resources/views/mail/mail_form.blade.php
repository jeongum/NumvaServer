<table class="mail_form" border = "0">
<tr>
	<th>Subject</th>
	<td>{{$data['subject']}}</td>
</tr>
<tr>
	<th>Email</th>
	<td>{{$data['emailAddr']}}</td>
</tr>
<tr>
	<th>Content</th>
	<td><?php echo nl2br($data['content']); ?></td>
</tr>
</table>