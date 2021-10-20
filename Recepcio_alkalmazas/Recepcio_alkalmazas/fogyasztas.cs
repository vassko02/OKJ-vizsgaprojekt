using System;
using System.Collections.Generic;
using System.Text;

namespace Recepcio_alkalmazas
{
	class fogyasztas
	{
		private string _guestname;

		public string guestname
		{
			get { return _guestname; }
			set { _guestname = value; }
		}
		private Dictionary<string, double> _cons;
		public Dictionary<string, double> cons
		{
			get { return _cons; }
			set { _cons = value; }
		}
		public void consfeltolt(string itemname, double price)
        {
			cons.Add(itemname,price);
        }
		public fogyasztas()
		{

		}
		public fogyasztas(string guestname,Dictionary<string,double> cons)
		{
			this.guestname = guestname;
			this.cons = cons;
		}
	}
}
