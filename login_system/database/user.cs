using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Loginsystem
{
    #region User
    public class User
    {
        #region Member Variables
        protected int _slno;
        protected string _name;
        protected string _email;
        protected string _password;
        protected string _gender;
        protected DateTime _time;
        #endregion
        #region Constructors
        public User() { }
        public User(string name, string email, string password, string gender, DateTime time)
        {
            this._name=name;
            this._email=email;
            this._password=password;
            this._gender=gender;
            this._time=time;
        }
        #endregion
        #region Public Properties
        public virtual int Slno
        {
            get {return _slno;}
            set {_slno=value;}
        }
        public virtual string Name
        {
            get {return _name;}
            set {_name=value;}
        }
        public virtual string Email
        {
            get {return _email;}
            set {_email=value;}
        }
        public virtual string Password
        {
            get {return _password;}
            set {_password=value;}
        }
        public virtual string Gender
        {
            get {return _gender;}
            set {_gender=value;}
        }
        public virtual DateTime Time
        {
            get {return _time;}
            set {_time=value;}
        }
        #endregion
    }
    #endregion
}