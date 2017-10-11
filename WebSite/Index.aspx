<%@ Page Language="C#" AutoEventWireup="true" CodeFile="Index.aspx.cs" Inherits="_Default" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title>AskLocal</title>
</head>
<body>

	<a href="Home.aspx">Home</a></br>

	<h1>Ask</h1>
	<p>You are looking at <asp:label ID="curName" runat="server"></asp:label></p>
	<p>Right now theres not much to do, but there will be soon!</p>
	<p>Your Question here!:<br /><asp:Textbox ID="questionText" runat="server" Text="" /></p>
	<asp:Button ID="askButton"  runat="server" Text="Ask Question" OnClick="ask" />
    <div class ="questionList">
	<br /><br />
	    <form id="form1" runat="server">
		<p>All the asked questions:</p>
		<p><asp:label ID="questionlist" runat="server"></asp:label></p>
    </div>
    </form>
	
</body>
</html>
