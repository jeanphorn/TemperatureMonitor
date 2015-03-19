/* tests/unit-test.h.  Generated from unit-test.h.in by configure.  */
/*
 * Copyright © 2008-2014 Stéphane Raimbault <stephane.raimbault@gmail.com>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the BSD License.
 */

#ifndef _UNIT_TEST_H_
#define _UNIT_TEST_H_

/* Constants defined by configure.ac */
#define HAVE_INTTYPES_H 1
#define HAVE_STDINT_H 1

#ifdef HAVE_INTTYPES_H
#include <inttypes.h>
#endif
#ifdef HAVE_STDINT_H
# ifndef _MSC_VER
# include <stdint.h>
# else
# include "stdint.h"
# endif
#endif

#define SERVER_ID		17
#define INVALID_SERVER_ID	18
#define LINE_LEN		256
#define MaxS			32

/* Server allocates address + nb */
const uint16_t UT_BITS_ADDRESS = 0x130;
const uint16_t UT_BITS_NB = 0x25;
const uint8_t UT_BITS_TAB[] = { 0xCD, 0x6B, 0xB2, 0x0E, 0x1B };

const uint16_t UT_INPUT_BITS_ADDRESS = 0x1C4;
const uint16_t UT_INPUT_BITS_NB = 0x16;
const uint8_t UT_INPUT_BITS_TAB[] = { 0xAC, 0xDB, 0x35 };

const uint16_t UT_REGISTERS_ADDRESS = 0x16B;
/* Raise a manual exception when this address is used for the first byte */
const uint16_t UT_REGISTERS_ADDRESS_SPECIAL = 0x6C;
/* The response of the server will contains an invalid TID or slave */
const uint16_t UT_REGISTERS_ADDRESS_INVALID_TID_OR_SLAVE = 0x6D;
/* The server will wait for 1 second before replying to test timeout */
const uint16_t UT_REGISTERS_ADDRESS_SLEEP_500_MS = 0x6E;
/* The server will wait for 5 ms before sending each byte */
const uint16_t UT_REGISTERS_ADDRESS_BYTE_SLEEP_5_MS = 0x6F;

const uint16_t UT_REGISTERS_NB = 0x3;
const uint16_t UT_REGISTERS_TAB[] = { 0x022B, 0x0001, 0x0064 };
/* If the following value is used, a bad response is sent.
   It's better to test with a lower value than
   UT_REGISTERS_NB_POINTS to try to raise a segfault. */
const uint16_t UT_REGISTERS_NB_SPECIAL = 0x2;

const uint16_t UT_INPUT_REGISTERS_ADDRESS = 0x00;
const uint16_t UT_INPUT_REGISTERS_WET_ADDRESS = 0x01;
const uint16_t UT_INPUT_REGISTERS_NB = 0x1;
const uint16_t UT_INPUT_REGISTERS_TAB[] = { 0x000A };

const float UT_REAL = 916.540649;
const uint32_t UT_IREAL = 0x4465229a;
const uint32_t UT_IREAL_DCBA = 0x9a226544;

struct Senser
{
	char senserName[20];
	int	 senserId;
	int temperature;
	int humidity;
}sensers[MaxS];

#endif /* _UNIT_TEST_H_ */
