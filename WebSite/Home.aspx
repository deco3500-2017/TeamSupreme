<%@ Page Language="C#" AutoEventWireup="true" CodeFile="Home.aspx.cs" Inherits="Home" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
</head>
<body>
    <form id="form1" runat="server">
    <div>
		<%--<h1>Home</h1>--%>
		<p>Choose which location to learn more about</p>
		<p>You can input your username here:</p>
		<asp:Textbox ID="usName" runat="server" Text="" />
		<br /><br />
		<asp:Button ID="location1" runat="server" Text="Markets" OnClick="chooseLoc" />
		<asp:Button ID="location2" runat="server" Text="Nightclub" OnClick="chooseLoc" />
		<asp:Button ID="location3" runat="server" Text="Waterfall" OnClick="chooseLoc" />
    </div>
    </form>
</body>
</html>
