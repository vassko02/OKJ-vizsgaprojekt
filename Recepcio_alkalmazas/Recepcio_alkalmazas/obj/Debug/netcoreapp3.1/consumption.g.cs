﻿#pragma checksum "..\..\..\consumption.xaml" "{ff1816ec-aa5e-4d10-87f7-6f4963833460}" "9B0E8CA2EA6DA4BB7BE8309AC42CDE1D81CCF1A9"
//------------------------------------------------------------------------------
// <auto-generated>
//     This code was generated by a tool.
//     Runtime Version:4.0.30319.42000
//
//     Changes to this file may cause incorrect behavior and will be lost if
//     the code is regenerated.
// </auto-generated>
//------------------------------------------------------------------------------

using Recepcio_alkalmazas;
using System;
using System.Diagnostics;
using System.Windows;
using System.Windows.Automation;
using System.Windows.Controls;
using System.Windows.Controls.Primitives;
using System.Windows.Controls.Ribbon;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Ink;
using System.Windows.Input;
using System.Windows.Markup;
using System.Windows.Media;
using System.Windows.Media.Animation;
using System.Windows.Media.Effects;
using System.Windows.Media.Imaging;
using System.Windows.Media.Media3D;
using System.Windows.Media.TextFormatting;
using System.Windows.Navigation;
using System.Windows.Shapes;
using System.Windows.Shell;


namespace Recepcio_alkalmazas {
    
    
    /// <summary>
    /// consumption
    /// </summary>
    public partial class consumption : System.Windows.Window, System.Windows.Markup.IComponentConnector {
        
        
        #line 21 "..\..\..\consumption.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.Button btn_erkezes;
        
        #line default
        #line hidden
        
        
        #line 28 "..\..\..\consumption.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.Button btn_tavozas;
        
        #line default
        #line hidden
        
        
        #line 35 "..\..\..\consumption.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.Button btn_modosit;
        
        #line default
        #line hidden
        
        
        #line 42 "..\..\..\consumption.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.Button btn_fogyasztás;
        
        #line default
        #line hidden
        
        
        #line 49 "..\..\..\consumption.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.Button btn_fizetes;
        
        #line default
        #line hidden
        
        private bool _contentLoaded;
        
        /// <summary>
        /// InitializeComponent
        /// </summary>
        [System.Diagnostics.DebuggerNonUserCodeAttribute()]
        [System.CodeDom.Compiler.GeneratedCodeAttribute("PresentationBuildTasks", "4.8.1.0")]
        public void InitializeComponent() {
            if (_contentLoaded) {
                return;
            }
            _contentLoaded = true;
            System.Uri resourceLocater = new System.Uri("/Recepcio_alkalmazas;component/consumption.xaml", System.UriKind.Relative);
            
            #line 1 "..\..\..\consumption.xaml"
            System.Windows.Application.LoadComponent(this, resourceLocater);
            
            #line default
            #line hidden
        }
        
        [System.Diagnostics.DebuggerNonUserCodeAttribute()]
        [System.CodeDom.Compiler.GeneratedCodeAttribute("PresentationBuildTasks", "4.8.1.0")]
        [System.ComponentModel.EditorBrowsableAttribute(System.ComponentModel.EditorBrowsableState.Never)]
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Design", "CA1033:InterfaceMethodsShouldBeCallableByChildTypes")]
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Maintainability", "CA1502:AvoidExcessiveComplexity")]
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1800:DoNotCastUnnecessarily")]
        void System.Windows.Markup.IComponentConnector.Connect(int connectionId, object target) {
            switch (connectionId)
            {
            case 1:
            this.btn_erkezes = ((System.Windows.Controls.Button)(target));
            
            #line 21 "..\..\..\consumption.xaml"
            this.btn_erkezes.Click += new System.Windows.RoutedEventHandler(this.btn_erkezes_Click);
            
            #line default
            #line hidden
            return;
            case 2:
            this.btn_tavozas = ((System.Windows.Controls.Button)(target));
            
            #line 28 "..\..\..\consumption.xaml"
            this.btn_tavozas.Click += new System.Windows.RoutedEventHandler(this.btn_tavozas_Click);
            
            #line default
            #line hidden
            return;
            case 3:
            this.btn_modosit = ((System.Windows.Controls.Button)(target));
            
            #line 35 "..\..\..\consumption.xaml"
            this.btn_modosit.Click += new System.Windows.RoutedEventHandler(this.btn_modosit_Click);
            
            #line default
            #line hidden
            return;
            case 4:
            this.btn_fogyasztás = ((System.Windows.Controls.Button)(target));
            return;
            case 5:
            this.btn_fizetes = ((System.Windows.Controls.Button)(target));
            
            #line 49 "..\..\..\consumption.xaml"
            this.btn_fizetes.Click += new System.Windows.RoutedEventHandler(this.btn_fizetes_Click);
            
            #line default
            #line hidden
            return;
            }
            this._contentLoaded = true;
        }
    }
}

