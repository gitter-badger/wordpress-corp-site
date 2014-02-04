<style>
	.table {
		text-align: left;
	}
    .table th {
        padding-right: 14px;
    }
    .table td {
		padding-right: 14px;
	}
</style>
<div class="wrap">
    <h2>Convertro CMS Documentation</h2>

    <div id="shortcode">
    	<h3>Inserting Convertro links inside of the editor</h3>
    	<p>Links can be inserted anywhere using the editor. All you have to do is to include the following snippet inside the editor to the place at you choice.</p>

    	<h3>Options / Attributes</h3>
    	<table class="table">
    		<tr>
                <th>text="...</th>
                <td>The text shown in the link</td>
                <td>Anything, any string</td>
            </tr>
            <tr>
    			<th>form="...</th>
                <td>If 'yes' the request demo form will pop up</td>
    			<td>yes | no | no value</td>
    		</tr>
    		<tr>
                <th>page="...</th>
    			<th>A link to other pages within the site</th>
    			<td>"resources/blog" | "about" | "strength/measure" etc.</td>
    		</tr>
    		<tr>
    			<th>url="...</th>
                <td>Links to external page</td>
    			<td>any link starts with "http..."</td>
    		</tr>
    		<tr>
    			<th>style="...</th>
                <td>The color of the button</td>
    			<td>pink | orange | yellow | gray | white | teal</td>
    		</tr>
    	</table>
        <div>
            <h3>Examples</h3>
            <p>pink link to google</p>
            <code>[demo-link text="Check Google now!" url="http://www.google.com" style="pink"]</code>
            <p>yellow internal link to white papers</p>
            <code>[demo-link text="White papers" page="resources/white-papers" style="yellow"]</code>
            <p>teal request demo link that pops up the form</p>
            <code>[demo-link text="requesting a demo" form="yes" style="teal"]</code>
        </div>
    </div>

</div>