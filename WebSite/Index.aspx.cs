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
        current = Application["current"].ToString();
        curName.Text = current;

        showQuestions();
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

    }

    protected void showQuestions() {
        switch (current)
        {
            case "location1":
                //show all questions1
                foreach (Question q in questions1)
                {
                    //print the question to questionList
                    questionlist.Text = questionlist.Text + "<br>" + q.getName() + " @ " + q.getTime().ToString() +" asked: "+ q.getQuestion() + "<br>";
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
}