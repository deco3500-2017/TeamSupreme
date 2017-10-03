using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class Home : System.Web.UI.Page
{
    String current = "";
    protected void Page_Load(object sender, EventArgs e)
    {

    }

    protected void chooseLoc(object sender, EventArgs e)
    {
        //grab the string from the button, and then go to index page and load appropriate info
        Button button = (Button)sender;
        current = button.ID;
        Application["current"] = current;
        HttpCookie username = new HttpCookie("Name");
        username.Value = usName.Text;
        Response.Redirect("Index.aspx");
    }

}