﻿using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

/// <summary>
/// Summary description for Answer
/// </summary>
public class Answer
{
    int points;
    string text;

    public Answer(string text)
    {
        //
        // TODO: Add constructor logic here
        //
        this.text = text;
        this.points = 0;
    }

    public String toString() { return this.text; }
}