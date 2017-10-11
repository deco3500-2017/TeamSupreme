using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class _Default : System.Web.UI.Page
{
    private String current;

    //Could implement this as  HashMap<place, questions> later
    List<Question> questions1 = new List<Question>();
    List<Question> questions2 = new List<Question>();
    List<Question> questions3 = new List<Question>();

    protected void Page_Load(object sender, EventArgs e)
    {
        if (!Page.IsPostBack)
        {
            current = Application["current"].ToString();
            curName.Text = current;

            showQuestions();
        }
    }

    protected void ask(object sender, EventArgs e)
    {
        //add the question to question1,2,3 based on current
        switch (current)
        {
            case "location1":
                //questions1
                Question qu1 = new Question("bosco", questionText.Text);
                questions1.Add(qu1);
                break;
            case "location2":
                //questions1
                Question qu2 = new Question("bosco2", questionText.Text);
                questions2.Add(qu2);
                break;
            case "location3":
                //questions1
                Question qu3 = new Question("bosco3", questionText.Text);
                questions3.Add(qu3);
                break;
            default:
                break;
        }
        showQuestions();
        //Response.Redirect(Request.RawUrl);
    }

    protected void showQuestions() {
        switch (current)
        {
            case "location1":
                //show all questions1
                foreach (Question q in questions1)
                {
                    //print the question to questionList
                    questionlist.Text = "<div class=\"question\">";
                    questionlist.Text = questionlist.Text + "<br>" + q.getName() + " @ " + q.getTime().ToString() +" asked: "+ q.getQuestion() + "<br>";
                    questionlist.Text = questionlist.Text + "<form id=\"form1\" runat=\"server\">";
                    questionlist.Text = questionlist.Text + "</form>";
                    questionlist.Text = "</div>";
                    var newPanel = new Panel();
                    var newTextbox = new TextBox();
                    var newButton = new Button();
                    newTextbox.ID = q.GetHashCode().ToString();
                    newTextbox.Text = "";
                    newButton.ID = "answerButton";
                    newButton.Text = "Answer Question";
                    newButton.CommandArgument = q.GetHashCode().ToString();
                    newButton.Command += answer;
                    //newButton.Command += new CommandEventHandler(answer);
                    //questionlist.Text = questionlist.Text + "Answer Here: <asp:Textbox ID = \""+q+"\" runat = \"server\" Text = \"\" />" + "<br>";
                    //questionlist.Text = questionlist.Text + "<asp:Button ID = \"answerButton\" runat = \"server\" Text = \"Answer Question\" OnClick = \"answer(q)\" />" + "<br>";
                    newPanel.Controls.Add(newTextbox);
                    newPanel.Controls.Add(newButton);
                    form1.Controls.Add(newPanel);
                    foreach (Answer ans in q.getAnswers())
                    {
                        questionlist.Text = questionlist.Text + "<br> <p class=\"answers\">" + ans.toString() + "</p>";
                    }
                    
                }
                break;
            case "location2":
                //show all questions1
                foreach (Question q in questions2)
                {
                    //print the question to questionList
                    questionlist.Text = questionlist.Text + "<br>" + q.getName() + " " + q.getTime().ToString() + q.getQuestion() + "<br>";
                }
                break;
            case "location3":
                //show all questions1
                foreach (Question q in questions3)
                {
                    //print the question to questionList
                    questionlist.Text = questionlist.Text + "<br>" + q.getName() + " " + q.getTime().ToString() + q.getQuestion() + "<br>";
                }
                break;
        }
    }

    protected void answer(Object sender, CommandEventArgs e)
    {
        curName.Text = "LoSErvIlLE xd lmai";
        string question = e.CommandArgument.ToString();
        switch (current)
        {
            case "location1":
                //questions1
                //find "question" in questions1 and add the answer to that one
                foreach (Question q in questions1)
                {
                    if (q.GetHashCode().ToString() == question)
                    {
                        TextBox txt = (TextBox)FindControl(question);
                        Answer A = new Answer(txt.Text);
                        q.addAnswer(A);
                    }
                }
                break;
            case "location2":
                //questions1
                Question qu2 = new Question("bosco2", questionText.Text);
                questions2.Add(qu2);
                break;
            case "location3":
                //questions1
                Question qu3 = new Question("bosco3", questionText.Text);
                questions3.Add(qu3);
                break;
            default:
                break;
        }
        showQuestions();
    }

}