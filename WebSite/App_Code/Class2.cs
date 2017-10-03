using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

/// <summary>
/// A class for units
/// </summary>
public class Question
{
    String user;
    String text;
    DateTime time;



    public Question(String user, String text)
    {
        this.user = user;
        this.text = text;
        this.time = DateTime.Now;
    }

    public String getName() { return this.user; }

    public String getQuestion() { return this.text; }

    public DateTime getTime() { return this.time; }


}