using System;
using System.Collections.Generic;
using System.Text;
using System.ComponentModel;

namespace Recepcio_alkalmazas
{
    public class foglalas:INotifyPropertyChanged
    {
		public event PropertyChangedEventHandler PropertyChanged;
		private void onPropertyChanged(string propertyname)
		{
			PropertyChanged?.Invoke(this, new PropertyChangedEventArgs(propertyname));

		}
		private string _guestname;

		public string guestname
		{
			get { return _guestname; }
			set { _guestname = value; onPropertyChanged("guestname"); }
		}
		private string _IDnumber;

		public string IDnumber
		{
			get { return _IDnumber; }
			set { _IDnumber = value; onPropertyChanged("IDnumber"); }
		}
		private string _ArriveDate;

		public string arrivedate
		{
			get { return _ArriveDate; }
			set { _ArriveDate = value; onPropertyChanged("arrivaldate"); }
		}
		private string _leaveDate;

		public string LeaveDate
		{
			get { return _leaveDate; }
			set { _leaveDate = value; onPropertyChanged("Leavedate"); }
		}
		private int _guestnumber;

		public int guestnumber
		{
			get { return _guestnumber; }
			set { _guestnumber = value; onPropertyChanged("gustnumber"); }
		}
		private int _childrennumber;

		public int childrennumber
		{
			get { return _childrennumber; }
			set { _childrennumber = value; onPropertyChanged("childrennumber"); }
		}
		private int _adoultnumber;

		public int adoultnumber
		{
			get { return _adoultnumber; }
			set { _adoultnumber = value; onPropertyChanged("adoultnumber"); }
		}
		private string _servicetype;

		public string servicetype
		{
			get { return _servicetype; }
			set { _servicetype = value; onPropertyChanged("servicetype"); }
		}
		private string _roomtype;

		public string roomtype
		{
			get { return _roomtype; }
			set { _roomtype = value; onPropertyChanged("roomtype"); }
		}
		private int _price;

		public int price
		{
			get { return _price; }
			set { _price = value; onPropertyChanged("price"); }
		}
		private string _phone;
        public string phone
		{
			get { return _phone; }
			set { _phone = value; onPropertyChanged("phone"); }
		}
        public foglalas()
        {

        }
		public foglalas(string adatok)
		{
			guestname = adatok.Split(';')[0].ToString();
			IDnumber = adatok.Split(';')[1].ToString();
			arrivedate = adatok.Split(';')[2].ToString();
			LeaveDate = adatok.Split(';')[3].ToString();
			guestnumber = int.Parse(adatok.Split(';')[4]);
			childrennumber = int.Parse(adatok.Split(';')[5]);
			adoultnumber = int.Parse(adatok.Split(';')[6]);
			servicetype = adatok.Split(';')[7].ToString();
			roomtype = adatok.Split(';')[8].ToString();
			price = int.Parse(adatok.Split(';')[9]);
			phone = adatok.Split(';')[10].ToString();
		}
	}
}
