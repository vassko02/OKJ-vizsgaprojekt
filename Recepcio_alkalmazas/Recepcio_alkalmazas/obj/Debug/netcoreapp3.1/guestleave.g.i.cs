﻿#pragma checksum "..\..\..\guestleave.xaml" "{ff1816ec-aa5e-4d10-87f7-6f4963833460}" "019C77B5A10E39E459114F4FBD097A98238B1ED1"
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
    /// guestleave
    /// </summary>
    public partial class guestleave : System.Windows.Window, System.Windows.Markup.IComponentConnector {
        
        
        #line 23 "..\..\..\guestleave.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.Button btn_erkezes;
        
        #line default
        #line hidden
        
        
        #line 30 "..\..\..\guestleave.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.Button btn_tavozas;
        
        #line default
        #line hidden
        
        
        #line 37 "..\..\..\guestleave.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.Button btn_modosit;
        
        #line default
        #line hidden
        
        
        #line 44 "..\..\..\guestleave.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.Button btn_fogyasztás;
        
        #line default
        #line hidden
        
        
        #line 51 "..\..\..\guestleave.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.Button btn_fizetes;
        
        #line default
        #line hidden
        
        private bool _contentLoaded;
        
        /// <summary>
        /// InitializeComponent
        /// </summary>
        [System.Diagnostics.DebuggerNonUserCodeAttribute()]
        [System.CodeDom.Compiler.GeneratedCodeAttribute("PresentationBuildTasks", "5.0.10.0")]
        public void InitializeComponent() {
            if (_contentLoaded) {
                return;
            }
            _contentLoaded = true;
            System.Uri resourceLocater = new System.Uri("/Recepcio_alkalmazas;component/guestleave.xaml", System.UriKind.Relative);
            
            #line 1 "..\..\..\guestleave.xaml"
            System.Windows.Application.LoadComponent(this, resourceLocater);
            
            #line default
            #line hidden
        }
        
        [System.Diagnostics.DebuggerNonUserCodeAttribute()]
        [System.CodeDom.Compiler.GeneratedCodeAttribute("PresentationBuildTasks", "5.0.10.0")]
        [System.ComponentModel.EditorBrowsableAttribute(System.ComponentModel.EditorBrowsableState.Never)]
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Design", "CA1033:InterfaceMethodsShouldBeCallableByChildTypes")]
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Maintainability", "CA1502:AvoidExcessiveComplexity")]
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1800:DoNotCastUnnecessarily")]
        void System.Windows.Markup.IComponentConnector.Connect(int connectionId, object target) {
            switch (connectionId)
            {
            case 1:
            this.btn_erkezes = ((System.Windows.Controls.Button)(target));
            
            #line 23 "..\..\..\guestleave.xaml"
            this.btn_erkezes.Click += new System.Windows.RoutedEventHandler(this.btn_erkezes_Click);
            
            #line default
            #line hidden
            return;
            case 2:
            this.btn_tavozas = ((System.Windows.Controls.Button)(target));
            return;
            case 3:
            this.btn_modosit = ((System.Windows.Controls.Button)(target));
            
            #line 37 "..\..\..\guestleave.xaml"
            this.btn_modosit.Click += new System.Windows.RoutedEventHandler(this.btn_modosit_Click);
            
            #line default
            #line hidden
            return;
            case 4:
            this.btn_fogyasztás = ((System.Windows.Controls.Button)(target));
            
            #line 44 "..\..\..\guestleave.xaml"
            this.btn_fogyasztás.Click += new System.Windows.RoutedEventHandler(this.btn_fogyasztás_Click);
            
            #line default
            #line hidden
            return;
            case 5:
            this.btn_fizetes = ((System.Windows.Controls.Button)(target));
            
            #line 51 "..\..\..\guestleave.xaml"
            this.btn_fizetes.Click += new System.Windows.RoutedEventHandler(this.btn_fizetes_Click);
            
            #line default
            #line hidden
            return;
            }
            this._contentLoaded = true;
        }
    }
}

