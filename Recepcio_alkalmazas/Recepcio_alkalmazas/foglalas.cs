using System;
using System.Collections.Generic;
using System.Text;

namespace Recepcio_alkalmazas
{
    public class foglalas
    {
		private string _guestname;

		public string guestname
		{
			get { return _guestname; }
			set { _guestname = value; }
		}
		private string _IDnumber;

		public string IDnumber
		{
			get { return _IDnumber; }
			set { _IDnumber = value; }
		}
		private DateTime _ArriveDate;

		public DateTime arrivedate
		{
			get { return _ArriveDate; }
			set { _ArriveDate = value; }
		}
		private DateTime _leaveDate;

		public DateTime LeaveDAte
		{
			get { return _leaveDate; }
			set { _leaveDate = value; }
		}
		private int _guestnumber;

		public int guestnumber
		{
			get { return _guestnumber; }
			set { _guestnumber = value; }
		}
		private int _childrennumber;

		public int childrennumber
		{
			get { return _childrennumber; }
			set { _childrennumber = value; }
		}
		private int _adoultnumber;

		public int adoultnumber
		{
			get { return _adoultnumber; }
			set { _adoultnumber = value; }
		}
		private string _servicetype;

		public string servicetype
		{
			get { return _servicetype; }
			set { _servicetype = value; }
		}
		private string _roomtype;

		public string roomtype
		{
			get { return _roomtype; }
			set { _roomtype = value; }
		}
		private int _price;

		public int price
		{
			get { return _price; }
			set { _price = value; }
		}
		public foglalas(string adatok)
		{
			guestname = adatok.Split(';')[0].ToString();
			IDnumber = adatok.Split(';')[1].ToString();
			arrivedate = Convert.ToDateTime(adatok.Split(';')[2].ToString());
			LeaveDAte = Convert.ToDateTime(adatok.Split(';')[3].ToString());
			guestnumber = int.Parse(adatok.Split(';')[4]);
			childrennumber = int.Parse(adatok.Split(';')[5]);
			adoultnumber = int.Parse(adatok.Split(';')[6]);
			servicetype = adatok.Split(';')[7].ToString();
			roomtype = adatok.Split(';')[8].ToString();
			price = int.Parse(adatok.Split(';')[9]);
		}
	}
}
